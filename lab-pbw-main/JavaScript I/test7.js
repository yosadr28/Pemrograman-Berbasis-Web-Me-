const orang = {
  namaLengkap: function () {
    return this.namaDepan + ' ' + this.namaBelakang;
  }
}

const org1 = {
  namaDepan: 'Bangku',
  namaBelakang: 'Taman'
}

console.log(orang.namaLengkap.apply(org1));