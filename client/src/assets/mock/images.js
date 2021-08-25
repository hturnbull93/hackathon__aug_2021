export default Array.from({ length: 36 }).map((_, index) => ({
  url: `image-${index + 1}`,
  src: "https://www.placecage.com/200/300",
  alt: "Lorem ipsum",
  tags: ["food", "beach", "sport", "user1", "user2"]
}));
