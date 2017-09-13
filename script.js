
// this is a JS comment

var myNumber = 0; // This is a variable
// C++ users, notice how we don't have to declare the var type

function myFunction() {
  //var foo = 2;
  //var bar = 5;
  //alert(foo + bar);
  var text = document.getElementById('myText').value;
  myNumber = myNumber + text;
  //myVar = myVar + 1; // equivalent to myVar++, if you want to be fancy!
  //alert(myNumber);
  document.getElementById('output').innerHTML = myNumber + text
}

var newOutput = '';

newText("boots and ");

function newText(thing) {
  newOutput = newOutput + thing;
  //console.log(thing);
  document.getElementById('output').innerHTML = newOutput;
//if(thing > 5) {
  //alert('wow big number!');
//} else {
  //alert('that number is tiny');
//}

}
