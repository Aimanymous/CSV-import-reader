<!DOCTYPE html>
<html>
  <head>
    
    <title>Output & Processing</title>
    <link rel="stylesheet" href="csv.css">
    <link rel="icon" href="favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
   
  </head>
  <body>
    <h3> Table 1</h3>
    <table id="table"></table>
    <h3> Table 2</h3>
    <table id="table2" style="margin-top: 20px;"></table>
    <button  id="Button" onclick="goToSecondVersion()">2nd Version</button><button id="Button" onclick="goToSecondVersion()" style="background-color: #3498db; color: white; font-size: 20px; padding: 10px 20px;">2nd Version</button>



<script>
  function goToSecondVersion() {
    window.location.href = "second.html";
  }
</script>
    
    <script>
        window.onload = () => {
            var table =document.getElementById("table");
            var table2 = document.getElementById("table2");

            fetch ("input.csv")
               .then(res => res.text())
              .then(csv => {
                table.innerHTML ="";

                let rows = csv.split ("\r\n");
                let data = [];

                for (let row of rows) {
              let cols = row.match(/(?:\"([^\"]*(?:\"\"[^\"]*)*)\")|([^\",]+)/g);
              if (cols != null) {
                let tr = table.insertRow();
                let rowData = [];
                for (let col of cols) {
                  let td = tr.insertCell();
                  td.innerHTML = col.replace(/(^"|"$)/g, " ");
                  rowData.push(td.innerHTML);
                }
                data.push(rowData);
              }
            }

            let alphaValue = parseInt(data[5][1]) + parseInt(data[20][1]);
            let betaValue = parseInt(data[15][1]) / parseInt(data[7][1]);
            let charlieValue = parseInt(data[13][1]) * parseInt(data[12][1]);


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
          });
      };
    </script>
   
  </body>
</html>