const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click",() => {
    toggleLocalStorage();
    toggleRootClass();
});

function toggleRootClass(){
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'light' ? 'dark' : 'light';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}

function toggleLocalStorage(){
    if(isLight()){
        localStorage.removeItem("dark");
    }else{
        localStorage.setItem("dark","set");
    }
}

function isLight(){
    return localStorage.getItem("dark");
}

if(isLight()){
    toggleRootClass();
}

// Dropdown
$(document).ready(function() {
    // Handle click event on dropdown item
    $('.dropdown-item').click(function(e) {
        e.preventDefault(); // Prevent default link behavior

        // Get text of clicked item
        var selectedText = $(this).text();

        // Update button text with selected item
        $('.dropdown-toggle').text(selectedText);
    });
});

// image
function uploadImage(inputId, imageId) {
    const input = document.getElementById(inputId);
    const image = document.getElementById(imageId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            image.src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}