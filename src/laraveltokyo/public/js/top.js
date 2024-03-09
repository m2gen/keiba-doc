// JavaScript
const image1 = document.getElementById('image1');
const image2 = document.getElementById('image2');
const image3 = document.getElementById('image3');

const animateImage = (image) => {
  image.addEventListener('mouseover', function () {
    this.style.transform = 'scale(1.1)';
  });

  image.addEventListener('mouseout', function () {
    this.style.transform = 'scale(1)';
  });
};

animateImage(image1);
animateImage(image2);
animateImage(image3);
