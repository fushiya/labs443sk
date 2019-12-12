class RSA {

    // {n, e} - відкритий ключ
    // {n, d} - закритий ключ

    constructor() {
        this.p = 3;
        this.q = 11;
        this.e = 7; // число найменше: непарне, непарним натуральним, не мати спільних дільників від F()
        this.n = this.q * this.p;
        this.F = (this.q-1) * (this.p - 1);
        this.d = this.findD();
        this.characters = `АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХШЩЬЮЯ1234567890,.'-:\n `;
    }

    get p() {
        return this._p;
    }

    set p(value) {
        this._p = value;
    }

    get q() {
        return this._q;
    }

    set q(value) {
        this._q = value;
    }

    get e() {
        return this._e;
    }

    set e(value) {
        this._e = value;
    }

    get n() {
        return this._n;
    }

    set n(value) {
        this._n = value;
    }

    get F() {
        return this._F;
    }

    set F(value) {
        this._F = value;
    }

    get d() {
        return this._d;
    }

    set d(value) {
        this._d = value;
    }

    get characters() {
        return this._characters;
    }

    set characters(value) {
        this._characters = value;
    }

    findD() {
        let selectionD = 0;
        for (let i=1; i<1000; i++) {
            selectionD = ( i*this.F + 1 ) / this.e;
            // console.log(selectionD + " | " + Number.isInteger(selectionD));
            if (Number.isInteger(selectionD)) {
                return selectionD;
            }
        }
    }

    encryptoMessage(text) {
        let encryptMessage = [];
        for (let i=0; i<text.length; i++) {
            encryptMessage.push( Math.pow( (this.characters.indexOf(text[i].toUpperCase())) ,this.e) & this.n );
        }
        return encryptMessage.join('');
    }

    decryptoMessage(c) {
        let decryptMessage = [];
        for (let i=0; i<c.length; i++) {
            decryptMessage.push( this.characters[ Math.pow(c,this.d) % this.n ] );
        }
        return decryptMessage.join('');
    }

}

let rsa = new RSA();

const encrypto = (txt) => {
    document.querySelector('#inputText').value = rsa.encryptoMessage(txt);
}

const decrypto = (txt) => {
    document.querySelector('#inputText').value = rsa.decryptoMessage(txt);
}