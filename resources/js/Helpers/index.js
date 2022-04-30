export const clearObject = formObj => {
  for (const [key, value] of Object.entries(formObj)) {
    const keyName = `${key}`
    formObj[keyName] = (keyName == 'permissions_rights') ? new Set : null
  }
}
