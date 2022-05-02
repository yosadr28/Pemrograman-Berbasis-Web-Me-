const rakyat = [
  {
    id: 1,
    nama: 'Bangku Taman',
    umur: 20
  },
  {
    id: 2,
    nama: 'Lampu Taman',
    umur: 10
  },
  {
    id: 3,
    nama: 'Kembang Taman',
    umur: 35
  },
  {
    id: 4,
    nama: 'Kucing Taman'
  }
];

for (i = 0; i < rakyat.length; i++) {
  const orang = rakyat[i];

  console.log(`${orang.id}: ${orang.nama} (${orang.umur ?? 'N/A'})`);
}