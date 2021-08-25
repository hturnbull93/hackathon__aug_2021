export default Array.from({ length: 36 }).map((_, index) => ({
  imageId: Math.floor(Math.random() * 9999999),
  url: `image-${index + 1}`,
  src: `https://www.placecage.com/200/${200 + Math.floor(Math.random() * 100)}`,
  alt:
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin odio dolor, malesuada eu dui at, suscipit hendrerit justo. Maecenas pellentesque vulputate velit, ut efficitur justo elementum in. Maecenas et magna nec quam pharetra luctus. Cras mauris leo, iaculis id lorem non, cursus sollicitudin mi. Proin tristique a purus vitae finibus.",
  tags: ["food", "beach", "sport", "user1", "user2"]
}));
