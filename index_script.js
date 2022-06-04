let ad_link = document.getElementById("adm_link");
let em_link = document.getElementById("emp_link");

ad_link.addEventListener('mouseover', pop1);
ad_link.addEventListener('mouseout', shrink1);


em_link.addEventListener('mouseover', pop2);
em_link.addEventListener('mouseout', shrink2);
s

function pop1(e) {
    ad_link.style.height = '270px';
    ad_link.style.width = '270px';
    ad_link.style.borderBottomColor = '#2b6777';
}

function pop2(e) {
    em_link.style.height = '270px';
    em_link.style.width = '270px';
    em_link.style.borderBottomColor = '#2b6777';
}
 
function shrink1(e) {
    ad_link.style.height = '250px';
    ad_link.style.width = '250px';
    ad_link.style.borderBottomColor = '#52ab98';
}

function shrink2(e) {
    em_link.style.height = '250px';
    em_link.style.width = '250px';
    em_link.style.borderBottomColor = '#52ab98';
}