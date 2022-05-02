// const hitungGaji = function (gapok, tunjangan, persenPajak) {
//   return (gapok + tunjangan) * (1 - persenPajak);
// };

const hitungGaji = (gapok, tunjangan, persenPajak) => (gapok + tunjangan) * (1 - persenPajak);

console.log(hitungGaji(500000, 2000000, .045));

function alokasiGaji(gaji, ...alokasi) {
  if (alokasi.reduce((a, b) => a + b, 0) !== 100) {
    console.error('Alokasi tidak valid.');
    return;
  }

  return alokasi.map((bobot) => gaji * bobot / 100).join(' - ');
}

let gaji = hitungGaji(500000, 2000000, .045);



console.log(alokasiGaji(gaji, 15, 25, 60));