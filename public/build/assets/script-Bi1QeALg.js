document.addEventListener("DOMContentLoaded",function(){const e=document.querySelector('input[name="cm"]'),n=document.querySelector('input[name="inches"]');e&&n&&e.addEventListener("input",function(){const t=parseFloat(e.value);if(isNaN(t))n.value="";else{const c=t/2.54;n.value=c.toFixed(2)}})});
