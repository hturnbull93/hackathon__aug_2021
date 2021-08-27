/**
 *  Get image dimensions, resized as appropriate
 *
 *  @param {HTMLImageElement} img
 */
export default function caculateDimensions(img) {
  const MAX_WIDTH = img.width > img.height ? 1280 : 720;
  const MAX_HEIGHT = img.width > img.height ? 720 : 1280;

  let width = img.width;
  let height = img.height;

  if (width > height) {
    if (width > MAX_WIDTH) {
      height = height * (MAX_WIDTH / width);
      width = MAX_WIDTH;
    }
  } else {
    if (height > MAX_HEIGHT) {
      width = width * (MAX_HEIGHT / height);
      height = MAX_HEIGHT;
    }
  }

  return { width, height };
}
