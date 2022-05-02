const orang = {
  id: 7512764,
  namaLengkap: 'Bangku Taman',
  umur: 20,
  intro: function () {
    return `Nama saya ${this.namaLengkap}, umur ${this.umur} tahun.`;
  }
};

console.log(orang.id);
console.log(orang.namaLengkap);
console.log(orang.umur);
console.log(orang.intro());