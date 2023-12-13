<!DOCTYPE html>
<html>
  <head>
    <title>Import CSV</title>
    <link rel="stylesheet" href="csv.css">
    <link rel="icon" href="favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
   
  </head>
  <body>
    <h3> This 2nd version is you can upload the Table_Input.csv file and it will functioning like the assessment want.</h3>
    <p style="font-size: smaller;">##Notes If you want to try with different csv file, refresh the page and upload the file, Also table 2 is only functioning for the assessment using Table_Input.csv data.</p>
    
    <h3> Table 1</h3>
    <input type="file" accept=".csv" id="picker">
    <table id="table"></table>
    <h3> Table 2</h3>
    <table id="table2"></table>
   
    <button id="backButton" onclick="goToFirstVersion()" style="background-color: #3498db; color: white; font-size: 20px; padding: 10px 20px;">1st Version</button>

    
    <script>
        window.onload = () => {
            var reader =new FileReader(),
                picker = document.getElementById("picker"),
                table =document.getElementById("table"),
                table2 = document.getElementById("table2");
                backButton = document.getElementById("backButton");

            picker.onchange = () => reader.readAsText(picker.files[0]);

            reader.onloadend = () => {
                let csv = reader.result;

                table.innerHTML = "";
                let rows = csv.split("\r\n");

                for (let row of rows) {
              let cols = row.match(/(?:\"([^\"]*(?:\"\"[^\"]*)*)\")|([^\",]+)/g);
              if (cols != null) {
                let tr = table.insertRow();
                for (let col of cols) {
                  let td = tr.insertCell();
                  td.innerHTML = col.replace(/(^"|"$)/g, " ");
                }
              }
            }
            let data = table.rows;

            let alphaValue = parseInt(data[5].cells[1].innerHTML) + parseInt(data[20].cells[1].innerHTML);
            let betaValue = parseInt(data[15].cells[1].innerHTML) / parseInt(data[7].cells[1].innerHTML);
            let charlieValue = parseInt(data[13].cells[1].innerHTML) * parseInt(data[12].cells[1].innerHTML);


            let table2Data = [
              ["<b>Category</b>","<b>Value</b>"],
              ["Alpha", alphaValue],
              ["Beta", betaValue],
              ["Charlie", charlieValue]
            ];

            for (let row of table2Data) {
              let tr = table2.insertRow();
              for (let col of row) {
                let td = tr.insertCell();
                td.innerHTML = col;
              }
            }
          };
          backButton.onclick = () => {
          window.location.href = "index.html";
        };
          
      };
    </script>
   
  </body>
</html>