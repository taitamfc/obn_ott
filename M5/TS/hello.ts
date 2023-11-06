// let x: number = 10;
// console.log(x);

// let y: string = 'hieu';
// console.log(y);

// let typeany: any = 12;
// typeany = 'number'
// console.log(typeany);

// function xuly():void {
//     console.log('helle void');
    
// }
// xuly();

// let xulyaray: any[] = [1,'hi']
// console.log(xulyaray);

// let xylytuple:[number,string,any] = [1,'hello','hi']
// console.log(xylytuple);

// enum xylyenum
// {
//     phi='a',
//     hieu = 1,
//     long ,
// }

// console.log(xylyenum.long);

// interface Student{
//     name:string;
//     age:number;
//     address?:string;
// }

// const student:Student = {
//     name: 'long',
//     age:18,
// }

// console.log(student['name']);

// let students:Student[]=[
//     {
//         name:'long',
//         age:24,
//     },
//     {
//         name:'hieu',
//         age:22,
//     }
// ]
// console.log(students[1].name);



// interface xylyarray1 {
//     [index:number]:string;
// }

// let a:xylyarray1 = ['long','phi','hieu']
// console.log(a);


class HCN {
    a:number
    b:number
    constructor(a:number, b:number){
        this.a = a;
        this.b = b;
    }
     getCV():number{
        return (this.a + this.b) * 2 
     }

     getDT():number{
        return this.a * this.b
     }


}

let hn = new HCN(3,3);

console.log('chu vi hình chữ nhật là ' +  hn.getCV() );
console.log( hn.getDT() );




