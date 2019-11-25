window.onbeforeunload = confirmExit;
function confirmExit() {
    if (isAnyTaskInProgress) {
       return "Some task is in progress. Are you sure, you want to close?";
    }
}

function formatCurrency(n, currency) {
    return currency + " " + parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

// function numberFormat(currency_sign,fraction_unit,exchange_rate,price){
// 	var p = (exchange_rate*fraction_unit)*parseFloat(price);
// 	var total = p.toFixed(2);
// 	var result = currency_sign+' '+total;
// 	return result;
// }