const orang = {
    id : 3,
    namalengkap : 'Babon',
    umur : 90,
    intro: function(){
        return `Hello! I'm ${this.namalengkap}`;
    }
}

console.log(orang.namalengkap);