document.addEventListener('DOMContentLoaded', () => {
  const price = document.querySelector('[data-calc-price]');
  const down = document.querySelector('[data-calc-down]');
  const term = document.querySelector('[data-calc-term]');
  const out = document.querySelector('[data-calc-result]');
  if (!price || !down || !term || !out) return;

  const defaultFormula = '(price - down) / term';
  const formula = window.tvoeAuto?.calculatorFormula || defaultFormula;
  const fmt = (number) => new Intl.NumberFormat('ru-RU').format(number) + ' ₽';

  /* Converts the admin formula to reverse Polish notation without evaluating code. */
  const calculate = (expression, values) => {
    const tokens = [];
    const source = String(expression || '').trim();
    const pattern = /\s*(\d*\.?\d+|price|down|term|[()+\-*/])/gy;
    let match;
    while (pattern.lastIndex < source.length) {
      match = pattern.exec(source);
      if (!match) return null;
      tokens.push(match[1]);
    }

    const precedence = { '+': 1, '-': 1, '*': 2, '/': 2 };
    const output = [];
    const operators = [];
    let expectingValue = true;
    for (const token of tokens) {
      if (/^\d/.test(token) || Object.hasOwn(values, token)) {
        if (!expectingValue) return null;
        output.push(token);
        expectingValue = false;
      } else if (token === '(') {
        if (!expectingValue) return null;
        operators.push(token);
      } else if (token === ')') {
        if (expectingValue) return null;
        while (operators.length && operators.at(-1) !== '(') output.push(operators.pop());
        if (operators.pop() !== '(') return null;
      } else {
        if (expectingValue) return null;
        while (operators.length && precedence[operators.at(-1)] >= precedence[token]) output.push(operators.pop());
        operators.push(token);
        expectingValue = true;
      }
    }
    if (expectingValue) return null;
    while (operators.length) {
      const operator = operators.pop();
      if (operator === '(') return null;
      output.push(operator);
    }

    const stack = [];
    for (const token of output) {
      if (/^\d/.test(token)) stack.push(Number(token));
      else if (Object.hasOwn(values, token)) stack.push(values[token]);
      else {
        const right = stack.pop();
        const left = stack.pop();
        if (!Number.isFinite(left) || !Number.isFinite(right)) return null;
        stack.push({ '+': left + right, '-': left - right, '*': left * right, '/': right ? left / right : NaN }[token]);
      }
    }
    return stack.length === 1 && Number.isFinite(stack[0]) ? stack[0] : null;
  };

  const update = () => {
    const values = { price: Number(price.value), down: Number(down.value) || 0, term: Number(term.value) || 1 };
    const result = calculate(formula, values);
    const fallback = calculate(defaultFormula, values);
    const payment = Math.max(0, result === null ? fallback : result);

    document.querySelector('[data-calc-price-value]').textContent = fmt(values.price);
    document.querySelector('[data-calc-down-value]').textContent = fmt(values.down);
    document.querySelector('[data-calc-term-value]').textContent = values.term + ' мес.';
    out.textContent = '≈ ' + fmt(Math.round(payment / 100) * 100) + ' / мес.';
  };

  [price, down, term].forEach((input) => input.addEventListener('input', update));
  update();
});
