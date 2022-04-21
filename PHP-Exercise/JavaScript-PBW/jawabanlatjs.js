//Yosef Adrian - 2020130002 => Jawaban PBW Latihan JS 
// Soal 1    //works
function question1(a) {
  let text = '';
  if (a > 20) return "Kebanyakan!";
  if (a < 0) return "Nope!";
  for (let b = 1; b <= a; b++) {
    text += '$';
  }
  return text;
}

// Soal 2     //works
function question2(a, b) {
  if (a > b) return `${a} lebih besar dari ${b}`;
  if (b > a) return `${a} lebih kecil dari ${b}`;
  return `${a} sama dengan ${b}`;
}

// Soal 3    //works
function question3(r) {
  if( r<=0) return 'Radius invalid';
  return Number(Math.round(Math.PI * (r ** 2) +'e2') + 'e-2');
}

// Soal 4   //works
function question4(arr) {
  if(arr.find(angka => {return angka < 0; })) return 'Negative!';
  const sum = arr.reduce((prev,cur) => prev += cur);
  return Math.round(sum/arr.length);
}


// Soal 5      //works
function question5(arr, weight = 1) {
  if(arr.find(angka=> {return angka<0 || angka > 100;})) return 'Nilai invalid!';
  return arr.map(nilai =>{
    return Number(Math.round(nilai * weight + 'e1') + 'e-1');
  });
}

// Soal 6      //works
function question6(n) {
  if( n<=0) return "Invalid!";
  if( n> 100) return "Kebanyakan!";
  let output = '';
  for(let i =0; i< n; i++){
    for(let j = n; j>i+1; j--){
      output += " ";
    }
    for(let k=0; k<= i; k++){
      output += "$";
    }
    if( i<n-1){
      output += "\n";
    }
  }
  return output;
}

// Soal 7  //works
function question7(a) {
  let n = a.length; let tmpkecil = 0; let tmpbesar = 0;
  let nilaibesar = 0; let nilaikecil = 0; let nilaijml = 0;
  var sorted = a.slice().sort(function (a, b) {
    return a - b;
  });
  if (n > 1) {
    tmpkecil = sorted[0]; tmpbesar = sorted[sorted.length - 1];
    for (let i = 0; i < n; i++) {
      nilaijml += a[i];
    }
    nilaibesar = nilaijml - tmpkecil;
    nilaikecil = nilaijml - tmpbesar;
    let hasil = nilaikecil + " " + nilaibesar;
    return (hasil);
  } else {
    return ("Array invalid!");
  }
}

// Soal 8  //works
function question8(a) {
  const arr = a.split(" ");
  let result = '';
  arr.forEach((element, index) => { element.charAt(0).toUpperCase();
    result += element.charAt(0).toUpperCase() + element.slice(1).toLowerCase();
    if(index < arr.length - 1){
      result += " ";
    }
  });
  return result;
}

// Soal 9  //works
function question9(a) {
  if(a.find(grade => {return grade.toUpperCase() < 'A' || grade.toUpperCase() > 'E' })) {
    return 'Array invalid!';
  }
  const arrNums = a.map(grade => {
    switch (grade.toUpperCase()){
      case 'A' : return 4;
      case 'B' : return 3;
      case 'C' : return 2;
      case 'D' : return 1;
      case 'E' : return 0;
      default : return;
    }
  });
  const sum = arrNums.reduce((prev, cur) => prev += cur);
  return Number(Math.round(sum/arrNums.length + 'e2') + 'e-2');
}

// Soal 10  //works
function question10(a) {
  if (a <= 0) return "Invalid!";
  let result = "";
  for (let i = 2; i < a; i++) {
    while (a % i == 0) {
      result += i + " ";
      a = a / i;
    }
  }
  if (a > 2) {
    result += a + " ";
  }
  return result;
}

// Uji function dengan console.log() di bawah ini
// console.log(question1(5));


// Bagian di bawah ini jangan dihapus!
module.exports = {
  question1,
  question2,
  question3,
  question4,
  question5,
  question6,
  question7,
  question8,
  question9,
  question10
};