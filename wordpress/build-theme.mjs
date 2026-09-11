import { cpSync, existsSync, mkdirSync, readFileSync, writeFileSync } from 'node:fs';
import { dirname, join, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const wordpressDir = dirname(fileURLToPath(import.meta.url));
const sourceDir = resolve(wordpressDir, '..');
const themeDir = join(wordpressDir, 'tvoe-auto-siberia');

const pages = [
  ['index.html', 'front-page.php', 'home', 'Главная'],
  ['catalog.html', 'page-catalog.php', 'catalog', 'Каталог автомобилей'],
  ['installment.html', 'page-installment.php', 'installment', 'Рассрочка'],
  ['rent-to-own.html', 'page-rent-to-own.php', 'rent-to-own', 'Аренда с выкупом'],
  ['trade-in.html', 'page-trade-in.php', 'trade-in', 'Trade-in'],
  ['selection.html', 'page-selection.php', 'selection', 'Автоподбор'],
  ['application.html', 'page-application.php', 'application', 'Заявка на подбор'],
  ['catalog.html', 'page-automobili.php', 'catalog', 'Автомобили'],
  ['car.html', 'page-car.php', 'car', 'Карточка автомобиля'],
  ['news.html', 'page-news.php', 'news', 'Новости'],
  ['article.html', 'page-article.php', 'article', 'Материал'],
  ['reviews.html', 'page-reviews.php', 'reviews', 'Отзывы'],
  ['faq.html', 'page-faq.php', 'faq', 'Вопросы и ответы'],
  ['contact.html', 'page-contact.php', 'contact', 'Контакты'],
  ['privacy.html', 'page-privacy.php', 'privacy', 'Политика обработки персональных данных'],
  ['personal-data-consent.html', 'page-personal-data-consent.php', 'personal-data-consent', 'Согласие на обработку персональных данных'],
  ['404.html', '404.php', '404', 'Страница 404'],
];

const slugByFile = new Map([
  ['index.html', 'home'],
  ...pages.map(([html, , key]) => [html, key]),
]);

const assetManifest = {};
const customTemplates = new Set([
  'front-page.php',
  'page-catalog.php',
  'page-automobili.php',
  'page-car.php',
  'page-rent-to-own.php',
  'page-news.php',
  'page-article.php',
  'page-privacy.php',
  'page-personal-data-consent.php',
]);
const leadScriptBefore = {
  home: 'js/home.js',
  'trade-in': 'js/trade-form.js',
  application: 'js/application.js',
  contact: 'js/contact.js',
};

const phpQuote = (value) => value.replaceAll('\\', '\\\\').replaceAll("'", "\\'");

const convertBody = (html, key) => {
  const bodyMatch = html.match(/<body(?:\s+class="([^"]*)")?[^>]*>([\s\S]*?)<\/body>/i);
  if (!bodyMatch) throw new Error(`Body not found for ${key}`);

  const bodyClass = bodyMatch[1] || '';
  let body = bodyMatch[2].replace(
    /\s*<script\s+src="[^"]+"\s*><\/script>/gi,
    '',
  );

  body = body.replace(
    /\b(src|poster|data-image)="(img\/[^"?]+)(?:\?[^"]*)?"/g,
    (_, attribute, path) =>
      `${attribute}="<?php echo esc_url( tvoe_auto_asset_url( '${phpQuote(path)}' ) ); ?>"`,
  );

  body = body.replace(
    /href="([a-z0-9-]+\.html)(#[^"]*)?"/gi,
    (_, file, hash = '') => {
      const slug = slugByFile.get(file);
      if (!slug) return `href="${file}${hash}"`;
      return `href="<?php echo esc_url( tvoe_auto_page_url( '${phpQuote(slug)}' ) . '${phpQuote(hash)}' ); ?>"`;
    },
  );

  return { body: body.trim(), bodyClass };
};

const extractAssets = (html) => {
  const styles = [...html.matchAll(/<link\s+rel="stylesheet"\s+href="([^"?]+)(?:\?[^"]*)?"\s*\/?>/gi)].map(
    (match) => match[1],
  );
  const scripts = [...html.matchAll(/<script\s+src="([^"?]+)(?:\?[^"]*)?"\s*><\/script>/gi)].map(
    (match) => match[1],
  );
  if (!scripts.includes('js/menu.js')) scripts.unshift('js/menu.js');
  return { styles: [...new Set(styles)], scripts: [...new Set(scripts)] };
};

mkdirSync(themeDir, { recursive: true });
for (const directory of ['css', 'fonts', 'img', 'js']) {
  cpSync(join(sourceDir, directory), join(themeDir, directory), {
    recursive: true,
    force: true,
  });
}

for (const [htmlFile, phpFile, key, label] of pages) {
  const html = readFileSync(join(sourceDir, htmlFile), 'utf8');
  const { body, bodyClass } = convertBody(html, key);
  assetManifest[key] = extractAssets(html);
  if (leadScriptBefore[key]) {
    const styles = assetManifest[key].styles;
    if (!styles.includes('css/lead-success-modal.css')) styles.push('css/lead-success-modal.css');
    const scripts = assetManifest[key].scripts;
    if (!scripts.includes('js/leads.js')) {
      const index = scripts.indexOf(leadScriptBefore[key]);
      scripts.splice(index < 0 ? scripts.length : index, 0, 'js/leads.js');
    }
  }

  const templateHeader =
    phpFile.startsWith('page-')
      ? `/**\n * Template Name: ${label}\n * Template Post Type: page\n */\n`
      : '';
  const output = `<?php\n${templateHeader}get_header( null, array(\n    'body_class' => '${phpQuote(bodyClass)}',\n    'page_key'   => '${phpQuote(key)}',\n) );\n?>\n${body}\n<?php get_footer(); ?>\n`;
  const templatePath = join(themeDir, phpFile);
  if (customTemplates.has(phpFile) && existsSync(templatePath)) {
    console.log(`Preserved custom template ${phpFile}`);
  } else {
    writeFileSync(templatePath, output);
  }
}

const manifestPhp = `<?php\n/** Generated by wordpress/build-theme.mjs. */\nreturn ${JSON.stringify(assetManifest, null, 2)
  .replaceAll('"', "'")
  .replace(/'([^']+)':/g, "'$1' =>")
  .replaceAll('[', 'array(')
  .replaceAll(']', ')')
  .replaceAll('{', 'array(')
  .replaceAll('}', ')')};\n`;
mkdirSync(join(themeDir, 'inc'), { recursive: true });
writeFileSync(join(themeDir, 'inc/assets.php'), manifestPhp);

console.log(`Built ${pages.length} WordPress templates in ${themeDir}`);
