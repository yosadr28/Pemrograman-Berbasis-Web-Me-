let jmlBarang = 90, hargaBarang = 5000;

console.log(`Total nilai gudang: Rp${hargaBarang * jmlBarang}.`);
console.log(`Harga jual per barang (PPN 11%): Rp${Math.round(hargaBarang * 1.11)}.`);
console.log(`Total nilai jual: Rp${Math.round(hargaBarang * 1.11) * jmlBarang}.`);