//Yosef Adrian - 2020130002 => Jawaban PBW Latihan JS 
// Soal 1    //works
function question1(a) {
  let text = [];
  if (a < 0) {
    return ("Nope!");
  } else if (a > 20) {
    return ("Kebanyakan!");
  } else {
    for (let b = 1; b <= a; b++) {
      text[b] = "$";
    }
    return text.join("");
  }
}

// Soal 2     //works
function question2(a, b) {
  if (a > b) {
    return (a + " lebih besar dari " + b);
  } else if (b > a) {
    return (a + " lebih kecil dari " + b);
  } else {
    return (a + " sama dengan " + b);
  }
}

// Soal 3    //works
function question3(r) {
  const round = (number, decimalPlaces) => {
    const x = Math.pow(10, decimalPlaces);
    return Math.round(number * x) / x;
  }
  if (r > 0) {
    const hasil = ((Math.PI * r * r));
    return (round(hasil, 2));
  } else {
    return ("Radius invalid!");
  }
}

// Soal 4   //works
function question4(a) {
  let nilai = 0; let tidak = false;
  const round = (number, decimalPlaces) => {
    const x = Math.pow(10, decimalPlaces);
    return Math.round(number * x) / x;
  }
  for (let i = 0; i < a.length; i++) {
    if (a[i] >= 0) {
      nilai = nilai + a[i];
    } else {
      tidak = true;
    }
  }
  if (tidak) {
    return ("Negative!");
  } else {
    return (round((nilai / a.length), 0));
  }
}


// Soal 5      //works
function question5(a, b) {
  const round = (number, decimalPlaces) => {
    const x = Math.pow(10, decimalPlaces);
    return Math.round(number * x) / x;
  }
  if (b == null) {
    b = 1;
  }
  const p = []; let silang = false;
  for (let i = 0; i <= a.length - 1; i++) {
    if (a[i] < 0 || a[i] > 100) {
      silang = true;
      i = a.length - 1;
    } else {
      p[i] = round(a[i] * b, 1);
    }
  }
  if (!silang) {
    return (p);
  } else {
    return ("Nilai invalid!");
  }
}

// Soal 6      //works
function question6(a) {
  let i, j; let hasil = "";
  if (!(a <= 0 || a > 100)) {
    for (i = 1; i <= a; i++) {
      for (j = 0; j < a - i; j++) {
        hasil += " ";
      }
      for (k = 0; k < i; k++) {
        hasil += "$";
      }
      if (k < a) {
        hasil += "\n";
      }
    }
    return hasil;
  } else if (a > 100) {
    return ("Kebanyakan!");
  } else {
    return ("Invalid!");
  }
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
  const kalimatCapitalize = (p) => {
    let kalimat = p.toLowerCase().split(' ');
    for (let x = 0; x < kalimat.length; x++) {
      kalimat[x] = kalimat[x].charAt(0).toUpperCase() + kalimat[x].substring(1);
    }
    return kalimat.join(' ');
  }
  return (kalimatCapitalize(a));
}

// Soal 9  //works
function question9(a) {
  const round = (number, decimalPlaces) => {
    const x = Math.pow(10, decimalPlaces);
    return Math.round(number * x) / x;
  }
  String.prototype.equalsIgnoreCs = function (compareString) {
    return this.toUpperCase() === compareString.toUpperCase();
  };

  let nilai = 0; let sks = 2; let inv = false;
  for (let i = 0; i < a.length; i++) {
    if (typeof a[i] == 'string') {
      if (a[i].equalsIgnoreCs("a")) {
        nilai += 4 * sks;
      } else if (a[i].equalsIgnoreCs("b")) {
        nilai += 3 * sks;
      } else if (a[i].equalsIgnoreCs("c")) {
        nilai += 2 * sks;
      } else if (a[i].equalsIgnoreCs("d")) {
        nilai += 1 * sks;
      } else if (a[i].equalsIgnoreCs("e")) {
        nilai += 0;
      } else {
        inv = true;
      }
    }
    else {
      inv = true;
    }
  }
  if (!inv) {
    const na = round((nilai / (2 * a.length)), 2);
    return (na);
  } else {
    return ("Array invalid!");
  }
}

// Soal 10  //works
function question10(a) {
  let tmp = "";
  if (a <= 0 || a == null) {
    return ("Invalid!");
  } else {
    for (let i = 2; i < a; i++) {
      while (a % i == 0) {
        tmp += i + " ";
        a = a / i;
      }
    }
    if (a > 2) {
      tmp += a;
    }
    return (tmp);
  }
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