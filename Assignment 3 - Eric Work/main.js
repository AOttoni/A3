const url = "https://api.spacexdata.com/v3";

//CHOOSE BETWEEN 3 PAGES
function Selector(choice) {
    switch(choice){
        case 0: FetchRocketsInfo();
        break;
        case 1: FetchUpcomingInfo();
        break;
        case 2: FetchHistoryInfo();
        break;
    }
}


/* --------------------------------------------------
 *                  ROCKETS
 *--------------------------------------------------*/

 //FETCH ROCKETS DATA
function FetchRocketsInfo() {
    fetch(url + "/rockets")
        .then(response => response.json())
        .then(data => {
            GetRockets(data)
        })

        .catch(function (error) {
            //If there are errors they will be caught here
            console.log(error);
        });
}

//FILL TABLE WITH ROCKET INFO
function GetRockets(arr) {
    //if request was successful then data will have everything you asked for
    for (let i = 0; i < arr.length; i++) {
        console.log(arr[i].rocket_name, 
                    arr[i].active, 
                    arr[i].stages, 
                    arr[i].boosters,
                    arr[i].cost_per_launch, 
                    arr[i].success_rate_pct, 
                    arr[i].country);

        let properties = [arr[i].rocket_name,
                          arr[i].active,
                          arr[i].stages,
                          arr[i].boosters,
                          arr[i].cost_per_launch,
                          arr[i].success_rate_pct,
                          arr[i].country];

        let newRow = document.createElement("TR");
        document.getElementById("showData").appendChild(newRow);
        for (let j = 0; j < properties.length; j++) {
            let cell = document.createElement("TD");
            cell.appendChild(document.createTextNode(properties[j]));
            newRow.appendChild(cell);
        }
    }
}





/* --------------------------------------------------
 *               UPCOMING LAUNCHES
 *--------------------------------------------------*/
function FetchUpcomingInfo() {
    fetch(url + "/launches/upcoming")
        .then(response => response.json())
        .then(data => {
            GetUpcoming(data)
        })

        .catch(function (error) {
            //If there are errors they will be caught here
            console.log(error);
        });
}

function GetUpcoming(arr) {
    for (let i = 0; i < arr.length; i++) {
        console.log(arr[i].flight_number,
                    arr[i].launch_date_utc, 
                    arr[i].rocket.rocket_name,
                    arr[i].mission_name, 
                    arr[i].rocket.rocket_type);

        let properties = [arr[i].flight_number, 
                            arr[i].launch_date_utc, 
                            arr[i].rocket.rocket_name,
                            arr[i].rocket.rocket_type, 
                            arr[i].mission_name];

        let newRow = document.createElement("TR");
        document.getElementById("showData").appendChild(newRow);
        for (let j = 0; j < properties.length; j++) {
            let cell = document.createElement("TD");
            cell.appendChild(document.createTextNode(properties[j]));
            newRow.appendChild(cell);
        }        
    }
}





/* --------------------------------------------------
 *              PREVIOUS LAUNCHES
 *--------------------------------------------------*/

function FetchHistoryInfo() {
    //let num = document.getElementById("numResultsTB").value;
    fetch(url + "/launches/past?limit=" + document.getElementById("numResultsTB").value)
        .then(response => response.json())
        .then(data => {
            GetHistory(data)
        })

        .catch(function (error) {
            //If there are errors they will be caught here
            console.log(error);
        });
}

function UpdateHistoryInfo(num) {
    // I found the code to delete the table rows on Stack Overflow: 
    // https://stackoverflow.com/questions/7271490/delete-all-rows-in-an-html-table

    let elmtTable = document.getElementById('showData');
    let tableRows = elmtTable.getElementsByTagName('tr');
    let rowCount = tableRows.length;
    for (let x = rowCount - 1; x >= 0; x--) 
        elmtTable.removeChild(tableRows[x]);
    
    fetch(url + "/launches/past?limit=" + num)
        .then(response => response.json())
        .then(data => {
            GetHistory(data)
        })

        .catch(function (error) {
            //If there are errors they will be caught here
            console.log(error);
        });
}

function GetHistory(arr) {    
    for (let i = 0; i < arr.length; i++) {
        console.log(arr[i].flight_number,
                    arr[i].launch_date_utc, 
                    arr[i].rocket.rocket_name,
                    arr[i].mission_name, 
                    arr[i].rocket.rocket_type);

        let properties = [arr[i].flight_number, 
                            arr[i].launch_date_utc, 
                            arr[i].rocket.rocket_name,
                            arr[i].rocket.rocket_type, 
                            arr[i].mission_name];

        let newRow = document.createElement("TR");
        document.getElementById("showData").appendChild(newRow);
        for (let j = 0; j < properties.length; j++) {
            let cell = document.createElement("TD");
            cell.appendChild(document.createTextNode(properties[j]));
            newRow.appendChild(cell);
        }        
    }
}






/* --------------------------------------------------
 *               CHANGING NAV HEADER
 *--------------------------------------------------*/
function updateH(x) {
    if(x==0)
        document.getElementById("subtitle").innerHTML = "About Us";
    if(x==1)
        document.getElementById("subtitle").innerHTML = "Go to our Catalogue";
    if(x==2)
        document.getElementById("subtitle").innerHTML = "Check out your Profile";
    if(x==3)
        document.getElementById("subtitle").innerHTML = "View your cart";
  }
  
  //RESET HEADER CONTENT TO DEFAULT TITLE
  function revertH() {
    document.getElementById("subtitle").innerHTML = "Please Select an Option Below";
  }