// making an ajax get request 
$(function () {
    $.get("http://universities.hipolabs.com/search?country=United+states",function (data) {
        var output = "";
        $.each(data, function (key, value) {
            // calling the items as in the Json file
          var item = "<tr>";
          item += "<td>" + key + "</td>";
          item += "<td>" + value.name + "</td>";
          item += "<td>" + value.alpha_two_code + "</td>";
          item += "<td class='ctry'>" + value.country + "</td>";
          item += "<td>" + value.domains + "</td>";
          item += "<td>" + value.web_pages + "</td>";
          item += "</tr>";
  
          output += item;
        });
        $("tbody").html(output);
      }
    );
  })
  