// function redirect(code){
//     if(checkCode(code)){
//         window.location.href = ''
//     }
//
// }

async function checkCode(code) {
    if (!isNaN(code)) {
        let response = await fetch("scripts/checkCode.php?code=" + code)
        return await response.json();
    } else {
        return false;
    }
}