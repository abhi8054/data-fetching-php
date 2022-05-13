const buttons = document.getElementsByClassName("btn");
const tabs = document.getElementsByClassName("tab");
console.log(buttons);
function showTab(currentTab,btnColor){
    for(let i=0;i< buttons.length;i++){
        buttons[i].setAttribute("style", "background-color:none;color:none;");
    }
    buttons[currentTab].setAttribute("style", "background-color:" + btnColor + ";color:red;");

    for(let j=0;j< tabs.length;j++){
        tabs[j].setAttribute("style", "display:none;");
    }
    tabs[currentTab].setAttribute("style", "display:block;");
}
showTab(0,'#C8C7C7');

// const fetchData = ()=>{
//     const xhr = new XMLHttpRequest();
//     xhr.onreadystatechange = function(){
//         if(this.status == 200 && this.state == 4){
//
//         }
//     }
//     xhr.open('GET',"",true);
//     xhr.send();
// }