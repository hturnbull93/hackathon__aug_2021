/**
 *  Truncate a string to a fixed max value, automatically
 *  add ellipsis
 *
 *  @param {String} str
 *  @param {Number} maxLength
 */
export default function truncateString(str = "", maxLength = 100) {
  return str.length <= maxLength ? str : str.substr(0, maxLength) + "...";
}
