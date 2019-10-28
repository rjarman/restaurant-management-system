var food_item = document.getElementsByClassName('food_item');
var _TO = document.getElementsByClassName('TO');
var _CC = document.getElementsByClassName('CC');


var total_item_SM = 0;
var number_of_selected_item_SM = 0;
var total_item_BS = 0;
var total_item_D = 0;
var number_of_selected_item_D = 0;

function food_item_func() {

    for (var i = 0; i < food_item.length; i++) {

        if (Number(food_item[i].value)) {
            _CC[i].value = food_item[i].value;
            _TO[i].value = food_item[i].value;

            if (i < 4) {
                total_item_SM += parseInt(food_item[i].value);
                if (parseInt(food_item[i].value)) {
                    number_of_selected_item_SM += 1;
                }
            }

            if (i > 3 && i < 8) {
                total_item_BS += parseInt(food_item[i].value);
            }

            if (i > 7 && i < 12) {
                total_item_D += parseInt(food_item[i].value);
                if (parseInt(food_item[i].value)) {
                    // document.getElementsByClassName('badge')[2].parentElement.innerHTML +=
                    //     "<span class=\"badge bg-green\">" + document.getElementsByClassName('food_item')[i].parentElement
                    //     .parentElement.parentElement.getElementsByClassName('modal-title')[0].innerHTML +
                    //     "</span>";

                    // document.getElementsByClassName('badge')[2].insertAdjacentHTML("afterend", "<span class=\"badge bg-green\">" + document.getElementsByClassName('food_item')[9].parentElement.parentElement.parentElement.getElementsByClassName('modal-title')[0].innerHTML + "</span>")
                }
            }

        } else {
            _CC[i].value = 0;
            _TO[i].value = 0;
        }

    }
    document.getElementsByClassName('badge')[1].innerHTML = total_item_SM;
    document.getElementsByClassName('badge')[0].innerHTML = number_of_selected_item_SM;
    document.getElementsByClassName('badge')[3].innerHTML = total_item_BS;
    document.getElementsByClassName('badge')[2].innerHTML = total_item_D;
    // document.getElementsByClassName('badge')[2].innerHTML = number_of_selected_item_D;
    total_item_SM = 0;
    number_of_selected_item_SM = 0;
    total_item_BS = 0;
    total_item_D = 0;
    // number_of_selected_item_D = 0;


    // total amount
    total_amount();


}

function TO_func() {

    for (var i = 0; i < food_item.length; i++) {

        if (Number(_TO[i].value)) {
            food_item[i].value = _CC[i].value;
            food_item[i].value = _TO[i].value;
            _CC[i].value = food_item[i].value;
            _TO[i].value = food_item[i].value;


            if (i < 4) {
                total_item_SM += parseInt(food_item[i].value);
                if (parseInt(food_item[i].value)) {
                    number_of_selected_item_SM += 1;
                }
            }

            if (i > 3 && i < 8) {
                total_item_BS += parseInt(food_item[i].value);
            }

            if (i > 7 && i < 12) {
                total_item_D += parseInt(food_item[i].value);
            }


        } else {
            food_item[i].value = 0;
            food_item[i].value = 0;
            // _CC[i].value = 0;
            _TO[i].value = 0;
        }

    }
    document.getElementsByClassName('badge')[1].innerHTML = total_item_SM;
    document.getElementsByClassName('badge')[0].innerHTML = number_of_selected_item_SM;
    document.getElementsByClassName('badge')[3].innerHTML = total_item_BS;
    document.getElementsByClassName('badge')[2].innerHTML = total_item_D;
    total_item_SM = 0;
    number_of_selected_item_SM = 0;
    total_item_BS = 0;
    total_item_D = 0;


    // total amount 25 45 55 75 25 45 25 35 5 6 4 5
    total_amount();

}

function total_amount() {


    var i = 0;
    result = 0;

    var dolar = {
        set_menu_1: 25,
        set_menu_2: 45,
        set_menu_3: 55,
        set_menu_4: 75,
        chicken_burger: 25,
        beef_burger: 45,
        club_sandwitch: 25,
        sub_sandwitch: 35,
        cocacola: 5,
        sprite: 6,
        pepsi: 4,
        fanta: 5,
    };

    for (var key in dolar) {

        if (parseInt(document.getElementsByClassName('CC')[i].value)) {
            result += parseInt(document.getElementsByClassName('CC')[i].value) * dolar[key];
            console.log("result: " + result);
            console.log("i: " + i);
        }
        i++;


    }
    document.getElementsByClassName('TA')[0].innerHTML = 'Total: $' + parseInt(result);
    document.getElementsByClassName('TA')[1].innerHTML = 'Total: $' + result;
    // console.log(result);

}

function amount_given_back() {
    var agv = 0;
    if (Number(document.getElementsByClassName('GA')[0].value)) {
        agv = parseInt(document.getElementsByClassName('GA')[0].value) - result;
    }
    document.getElementsByClassName('AGB')[0].innerHTML = 'Amount Given Back: $' + agv;
}