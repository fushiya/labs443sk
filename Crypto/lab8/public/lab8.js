class BBS {
	constructor(p, q) {
		this.n = p*q;
		this.listX = [];
		this.listS = [];
	}

	setX(value) {
		let list = [this.n, value];
		while (list[0]!=0 && list[1]!=0) {
			if (list[0]>list[1]) list[0]%list[1];
			else list[1]=list[1]%list[0];
		}
		if (list[0]+list[1] == 1) {
			this.listX[0] = value % this.n; 
			this.listS[0] = this.listX[0] % 2;
			return false;
		}
		else return true;
	}

	increaseList(n) {
		for (let i=0; i!=n; i++) {
			this.listX.push(Math.pow( this.listX[this.listX.length-1], 2 ) % this.n);
		}

		for (let i=0; i!=this.listX.length; i++) {
			this.listS[i] = this.listX[i] % 2;
		}
	}

	setXRandom(value) {
		this.listX[0] = value % this.n; 
		this.listS[0] = this.listX[0] % 2;
	}

	getLists() {
		if (!this.listS.includes(0)) return `Error: (p mod 4) must be == (q mod 4).\nChange p or q!`;
		return `X: [${this.listX}]\nS: [${this.listS}]`;
	}

}

class Program {
	static main(p,q,x, l, root) {
		let bbs = new BBS(p, q);
		bbs.setXRandom(x);
		bbs.increaseList(l);
		root.innerText = bbs.getLists();
	}
}