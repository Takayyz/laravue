/**
 * cookieの値を取得する
 * @param {String} searchKey 検索するkey
 * @return {String} keyに対応する値
 */
export function getCookieValue (searchKey) {
  if (typeof searchKey === 'undefined') {
    return ''
  }

  let val = ''

  document.cookie.split(';').forEach(cookie => {
    const [key, value] = cookie.split('=')
    if (key === searchKey) {
      return val = value
    }
  })

  return val
}