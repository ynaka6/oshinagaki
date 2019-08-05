export function convertCaJapanese(date: Date) {
    let str = new Intl.DateTimeFormat('ja-JP-u-ca-japanese', { era: 'long' }).format(date);
    return str.replace(/[0-9]/g, (s: string) => (new Intl.NumberFormat('zh-Hans-CN-u-nu-hanidec')).format(parseInt(s)));
}