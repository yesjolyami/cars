document.addEventListener('DOMContentLoaded',()=>{
  const main=document.querySelector('.detail-gallery__main img');
  const thumbs=document.querySelectorAll('.gallery-thumb');
  if(!main||!thumbs.length)return;
  thumbs.forEach(thumb=>thumb.addEventListener('click',()=>{
    thumbs.forEach(item=>item.classList.remove('is-active'));
    thumb.classList.add('is-active');
    const image=thumb.dataset.image;
    if(image)main.src=image;
  }));
});
