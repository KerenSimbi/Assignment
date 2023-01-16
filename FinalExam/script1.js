$("#rate-to").html("Loading ... ");
fetch("'http://universities.hipolabs.com/search?country=United+states/").then(
  res => {
    res.json().then(
      data => {
        console.log(data.data);
        if (data.length > 0) {

          var temp = "";
          data.forEach((itemData) => {
            temp += "<tr>";
            temp += "<td>" + itemData.name + "</td>";
            temp += "<td>" + itemData.alpha_two_code + "</td>";
            temp += "<td>" + itemData.country + "</td>";
            temp += "<td>" + itemData.domains + "</td>";
            temp += "<td>" + itemData.web_pages + "</td>";
          });
          document.getElementById('data').innerHTML = temp;
        }
      }
    )
  }
) 