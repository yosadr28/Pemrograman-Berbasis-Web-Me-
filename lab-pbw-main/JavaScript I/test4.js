const resto = {
  namaResto: 'Bakso Gurih',
  jamBisnis: {
    buka: '10:00',
    tutup: '21.00'
  },
  menu: {
    promo: ['Bakso Iga', 'Bakso Nuklir', 'Bakso Seuhah'],
    biasa: ['Bakso 1/2 Porsi', 'Bakso Reguler', 'Bakso Cincang']
  }
};

console.log(resto.namaResto.toUpperCase());
console.log(`Buka: ${resto.jamBisnis.buka} | Tutup: ${resto.jamBisnis.tutup}`);
console.log('--------------------------');
console.log('-- Menu Promo --');
for (i = 0; i < resto.menu.promo.length; i++) {
  console.log(resto.menu.promo[i]);
}
console.log('-- Menu Biasa --');
for (i = 0; i < resto.menu.biasa.length; i++) {
  console.log(resto.menu.biasa[i]);
}