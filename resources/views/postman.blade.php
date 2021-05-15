<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://raw.githubusercontent.com/douglascrockford/JSON-js/master/json2.js"></script>
    </head>
    <body>
        <center>
            <label>Edit Value :</label>
            <select id="editSelect" onchange="onSelect()"></select>
            <button onclick="onEditClicked()">Edit</button>
            <br>
            <label>Key :</label>
            <input type="text" id="keyTxt">
            <label>Value :</label>
            <input type="text" id="valTxt">
            <button onclick="onAddClicked()">Add</button>
            <br><br>
            <button onclick="onClearClicked()">Clear</button>
            <br><br>

            <label>Result Json :</label><br>
            <textarea id="resultTxt" style="width: 50%;height: 35%;"></textarea>
            <br>
            
            <br><br>
            <label>Token : </label>
            <input type="text" id="tokenTxt">
            <input type="checkbox" id="useToken">Use Token
            <br><br>
            <label>Url: </label>
            <input type="text" id="urlTxt">
            <select id="methodSelect">
                <option>GET</option>
                <option>POST</option>
            </select>
            <button onclick="getResponse()">Request</button>
            <br><br>
            <label>Request Response :</label>
            <br>
            <textarea id="respTxt"></textarea>

            </form>
        </center>
        <script>
            var keyValuePairs = [];
            function onAddClicked()
            {
                var key = document.getElementById('keyTxt').value;
                var val = document.getElementById('valTxt').value;
                keyValuePairs.push(key);
                keyValuePairs.push(val);
                document.getElementById('resultTxt').innerHTML = generateJson(keyValuePairs);
                refreshEditSelect();
            }
            function onClearClicked()
            {
                keyValuePairs = [];
                document.getElementById('resultTxt').innerHTML = generateJson(keyValuePairs);
                refreshEditSelect();
            }
            function onEditClicked()
            {
                cur = document.getElementById('editSelect').value;
                for (let i = 0; i < keyValuePairs.length; i += 2) {
                    if (cur === keyValuePairs[i])
                    {
                        keyValuePairs[i + 1] = document.getElementById('valTxt').value
                        break;
                    }
                }
                document.getElementById('resultTxt').innerHTML = generateJson(keyValuePairs);
            }
            function onSelect()
            {
                cur = document.getElementById('editSelect').value;
                for (let i = 0; i < keyValuePairs.length; i += 2) {
                    if (cur === keyValuePairs[i])
                    {
                        document.getElementById('keyTxt').value = keyValuePairs[i];
                        document.getElementById('valTxt').value = keyValuePairs[i + 1];
                        break;
                    }
                }
            }
            function refreshEditSelect()
            {
                html = "";
                for (let i = 0; i < keyValuePairs.length; i += 2) {
                    html += "<option>" + keyValuePairs[i] + "</option>"
                }
                document.getElementById('editSelect').innerHTML = html;
            }
            function generateJson(keyValueArray)
            {
                if (keyValueArray == null)
                    return "{}";
                var js = "{";
                var mto = keyValueArray.length > 2;
                for (let i = 0; i < keyValueArray.length; i += 2) {
                    js += '\"' + keyValueArray[i] + "\": \"" + keyValueArray[i + 1] + "\"";
                    if (mto && i != keyValueArray.length - 2)
                        js += ", ";
                }
                js += "}";
                return js;
            }
            function getResponse()
            {
                var url = document.getElementById('urlTxt').value;
                var json = generateJson(keyValuePairs);
                var method = document.getElementById('methodSelect').value;
                var headers = null;
                if (url == "")
                {
                    alert("Enter a url !");
                    return;
                }
                if (document.getElementById('useToken').checked)
                {
                    if (document.getElementById('tokenTxt').value == "")
                    {
                        alert("Enter Token Value !");
                        return;
                    }
                    headers = {
                        "Authorization": "Bearer " + document.getElementById('tokenTxt').value
                    };
                }
                $.ajax({url: url, data: json, contentType: 'application/json; charset=utf-8', method: method, dataType: "json", headers: headers}).done(function(data) 
                {
                    document.getElementById('respTxt').innerHTML = JSON.stringify(data);
                });
            }
        </script>
    </body>
</html>