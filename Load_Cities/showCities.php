<html>
    <head>
        <script type="text/javascript">
            //create ajax engine line 1
            function getXmlHttpObject() {

                var xmlHttpRequest;

                if (window.ActiveXObject) {
                    xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } else {
                    xmlHttpRequest = new XMLHttpRequest();
                }

                return xmlHttpRequest;
            }

            var myXmlHttpRequest = "";

            function getCities() {
                myXmlHttpRequest = getXmlHttpObject();

                if (myXmlHttpRequest) {
                    //line 2

                    var url = "/ajax/showCitiesPro.php"; //post
                    var data = "country=" + $('country').value;
                    myXmlHttpRequest.open("post", url, true); //Asynchronous true
                    myXmlHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    //assign callback function
                    myXmlHttpRequest.onreadystatechange = proc;
                    //send
                    myXmlHttpRequest.send(data);

                }
            }

            function proc() {
                if (myXmlHttpRequest.readyState == 4) {

                    if (myXmlHttpRequest.status == 200) {
                        //get data from server
                        var state = myXmlHttpRequest.responseXML.getElementsByTagName("state");

                        $('state').length = 0;

                        var myOption = document.createElement("option");
                        myOption.innerText = "--State/Province--";
                        $('state').appendChild(myOption);
                        for (var i = 0; i < state.length; i++) {
                            var state_name = state[i].childNodes[0].nodeValue;
                            //create new element option
                            var myOption = document.createElement("option");
                            myOption.value = state_name;
                            myOption.innerText = state_name;
                            $('state').appendChild(myOption);
                        }

                    }
                }
            }

            function $(id) {
                return document.getElementById(id);
            }

        </script>
    </head>

    <body>
        <select id="country" onchange="getCities();">
            <option value="">---Country---</option>
            <option value="United States">United States</option>
            <option value="China" >China</option>
        </select>
        <select id="state">
            <option value="">--State/Province--</option>
        </select>
        <select id="city">
            <option value="">--City--</option>
        </select>
    </body>
</html>
