let arr=[1,2,3,0,11,0,13];
let arr1=[];
let count=0;
function removeZero(arr){
    for(let i=0;i<arr.length;i++){
        if(arr[i]==0){
            arr.splice(i,1);
            count++;
        }
    }
    for(let i=0;i<count;i++){
        arr.push(0);
    }
}


function position(arr){
    let ele=10;
    for(let i=0;i<arr.length;i++){
        if(ele<arr[i]){
        // 0 to prevent splice function from deleting the element
            arr.splice(i,0,ele);
            return arr;
        }
    }
}


function som(arr,arr1){
    let ele=5;
    for(let i=0;i<arr.length;i++){
         for(let j=0;j<arr.length;j++){
            if(arr[i]+arr[j]==ele){
                arr1[0]=arr[i];
                arr1[1]=arr[j];
                break;
            }
         }
    }
    if(arr1.length==0){
        console.log("la somme de c'element ne se trouve pas dans se tableau");
    }
}

removeZero(arr);
console.log(arr);

position(arr);
console.log(arr);

som(arr,arr1);
console.log(arr1);