
function convertNumberToCurrency(number){
    
    return number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}

function convertMACAddr(mac_addr){

    return mac_addr.toString().replace(/(.)(?=(.{2})+(?!.))/g, "$1:");
}