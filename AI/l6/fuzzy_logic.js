class Fuzzy {
    constructor(currentTemperature) {
        this.currentTemperature = currentTemperature;
        this.conditions = [];
        this.degree = [];
        this.result = [];
    }

    get result() {
        return this._result;
    }

    set result(value) {
        this._result = value;
    } 

    get currentTemperature() {
        return this._currentTemperature;
    }

    set currentTemperature(value) {
        this._currentTemperature = value;
    }

    get conditions() {
        return this._conditions;
    }

    set conditions(value) {
        this._conditions = value;
    }

    get degree() {
        return this._degree;
    }

    set degree(value) {
        this._degree = value;
    }

    findCondition() {
        this.conditions[0] = 1/ (1+ Math.pow( (this.currentTemperature - 10)/7 ,12));
        this.conditions[1] = 1/ (1+ Math.pow( (this.currentTemperature - 20)/3 ,6));
        this.conditions[2] = 1/ (1+ Math.pow( (this.currentTemperature - 30)/6 ,10));

        switch(this.conditions.indexOf(Math.max.apply(null, this.conditions))) {
            case 0:
                this.conditions = this.conditions[0];
                this.result[1] = "cool";
                break;
            case 1:
                this.conditions = this.conditions[1];
                this.result[1] = "comfort";
                break;
            case 2:
                this.conditions = this.conditions[2];
                this.result[1] = "hot";
                break;
            default:
                break;
        }
    }

    findQualifier() {
        this.degree[0] = 1 - this.conditions;
        this.degree[1] = Math.pow(this.conditions, 2);
        this.degree[2] = Math.sqrt(this.conditions);

        switch(this.degree.indexOf(Math.max.apply(null, this.degree))) {
            case 0:
                this.result[0] = "not";
                break;
            case 1:
                this.result[0] = "very";
                break;
            case 2:
                this.result[0] = "more or less";
                break;
            default:
                break;
        }
    }
    
    toString() {
        return `Температура: ${this.currentTemperature}\nВисновок: ${this.result.join(' ')}`;
    }

}

const main = (temp) => {
    var fuzzy = new Fuzzy(temp);
    fuzzy.findCondition();
    fuzzy.findQualifier();
    alert( fuzzy );
}