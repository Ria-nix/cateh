let arrayOfEmployees = [];

let post = $.ajax({
    type: "POST",
    data: {
        role: getCookie("role"),
        token: getCookie("token"),
        dbname: getCookie("DBname")
    },
    url: "https://covidlist.online/api/output/employee",
    success: (msg) => {
        console.log(msg)
        let count = 0;
        let arr = JSON.parse(msg)["action"];
        // console.log(msg)

        for (let i = 0; i < arr["admin"].length; i++) {
            arrayOfEmployees.push(arr["admin"][i]);
            arrayOfEmployees[count]["isAdmin"] = true;
            count++;
        }

        for (let i = 0; i < arr["sysadmin"].length; i++) {
            arrayOfEmployees.push(arr["sysadmin"][i]);
            arrayOfEmployees[count]["isAdmin"] = false;
            count++;
        }

        sortByFIO(arrayOfEmployees)
    },
})


function renderEmployees(array) {
    let table = $("#table");
    table.empty();
    let text;
    for (let i = 0; i < array.length; i++) {
        let role = array[i]['isAdmin'] ? "Супер Администратор" : "Системный администратор";
        let isActive = array[i]['isActive'] === '1' ? "" : "style='background-color: #ddd'";
        let sysadmin_id = array[i]['id'];
        text = '<div class="item_table font_18">' +
            '<div class="item_info border" ' + isActive + '>' +
            '<p class="main_fio">' + array[i]['name'] + '</p>' +
            '<div class="mobile_version"  onclick="goToProfile('+ array[i]['id'] +')">' +
            '<div class="mobile_title">' +
            '<p>Выполнено за месяц</p>' +
            '<p>Текущих заказов </p>' +
            '<p class="role">Статус</p>' +
            '</div>' +
            '<div class="mobile_info">' +
            '<p class="complete_order">' + array[i]['completed'] + '</p>' +
            '<p class="current_order">' + array[i]['accepted'] + '</p>' +
            '<p class="role">' + role + '</p>' +
            '</div>' +
            '</div>' +
            '<p class="mobile_none complete_order">' + array[i]['completed'] + '</p>' +
            '<p class="mobile_none current_order">' + array[i]['accepted'] + '</p>' +
            '<p class="mobile_none role">' + role + '</p>' +
            '</div>' +
            '<button onclick="goToProfile(' + sysadmin_id + ')" class="click button border font_16 profile_view_button">Просмотреть</button>' +
            '</div>';
        table.append(text);
    }
    $("body").css("overflow", "visible")
    console.log(array)
}

function goToProfile(profile_id) {
    window.open(window.location.href + "/profile?id=" + profile_id, '_self').focus();
}

function sortByFIO(array) {
    let arrow = $('#arrow');
    let sorted;
    let isArrowEnabled = false;
    $.each(arrow.attr('class').split(/\s+/), function (index, item) {
        if (item === 'sort-arrow-down') {
            isArrowEnabled = true;
        }
    });
    if (isArrowEnabled) {
        arrow.removeClass("sort-arrow-down");
        arrow.addClass("sort-arrow-up");
        sorted = array.sort(function (a, b) {
            if (a["name"] < b["name"]) {
                return -1;
            }
            if (a["name"] > b["name"]) {
                return 1;
            }
            return 0;
        });
    } else {
        arrow.removeClass("sort-arrow-up");
        arrow.addClass("sort-arrow-down");
        sorted = array.sort(function (a, b) {
            if (a["name"] < b["name"]) {
                return 1;
            }
            if (a["name"] > b["name"]) {
                return -1;
            }
            return 0;
        });
    }

    arrayOfEmployees = sorted;
    renderEmployees(sorted);
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

function deleteCookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function findByNameAndRender(search_text) {
    console.log(search_text)
    console.log("searching")
    let matched = [];
    for (let i = 0; i < arrayOfEmployees.length; i++) {
        if (arrayOfEmployees[i]["name"].includes(search_text)) {
            matched.push(arrayOfEmployees[i]);
        }

        renderEmployees(matched);
    }
}

