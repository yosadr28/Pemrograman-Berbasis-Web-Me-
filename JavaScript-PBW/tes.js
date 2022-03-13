/*let a =20;
while(a>0){
    console.log(a--);
}

for(let a=0; a<=10;a++){
    console.log(a);
}*/

let nilai = [75, 50, 96, 60];
//Array wajib menggunakan const

const nilai2 = [75, 50, 96, 60];

nilai[2] = 80;
nilai2[2] = 80;

nilai2.push(100);
//nilai2.pop();



/*nilai2.splice(2,3, 87, 85, 89, 90);
for (let i = 0; i < nilai2.length; i++) {
    console.log(nilai2[i]);
}

console.log('\n');

nilai2.splice(2,2);
for (let i = 0; i < nilai2.length; i++) {
    console.log(nilai2[i]);
};
console.log('\n');*/

//nilai.forEach((angka) => {console.log(angka)});
console.log('\n');

//FIND
const nil = nilai2.find((angka)=>{return angka>=75});
console.log(nil);

//Filter
const rt = nilai2.filter((angka)=>{return angka>=75});
console.log(rt);

//Map
const art = nilai2.map((angka=>{return angka *.1;}))
console.log(art);