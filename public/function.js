
function openSideDropdown() {
    var dropdown = document.getElementById("sideDropdown");
    if (dropdown.classList.contains('show-side')) {
        dropdown.classList.remove('show-side');
    } else {
        dropdown.classList.add('show-side');
    }
}

function openProfileDropdown() {
    var profileDropdown = document.getElementById("profileDropdown");
    if (profileDropdown.style.right === "-250px") {
        profileDropdown.style.right = "0";
    } else {
        profileDropdown.style.right = "-250px";
    }
}

window.onclick = function(event) {
    if (!event.target.matches('.side-dropbtn')) {
        var dropdowns = document.getElementsByClassName("side-dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show-side")) {
                openDropdown.classList.remove("show-side");
            }
        }
    }

    if (!event.target.matches('.profile-dropbtn')) {
        var profileDropdown = document.getElementById("profileDropdown");
        if (profileDropdown.style.right === "0px") {
            profileDropdown.style.right = "-250px";
        }
    }
}



document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab');
    const indicator = document.querySelector('.tab-indicator');
    const searchInput = document.getElementById('searchInput');
    const searchType = document.getElementById('searchType');
    
    function updateIndicator(tab) {
        const tabRect = tab.getBoundingClientRect();
        const tabsRect = tab.parentElement.getBoundingClientRect();
        indicator.style.width = tabRect.width + 'px';
        indicator.style.left = (tabRect.left - tabsRect.left) + 'px';
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            
            if (tab.dataset.tab === 'titles') {
                searchInput.placeholder = "Enter title that you're interested";
                searchType.value = "titles";
            } else if (tab.dataset.tab === 'authors') {
                searchInput.placeholder = "Search by author names";
                searchType.value = "authors";
            }

            updateIndicator(tab);
        });
    });

    updateIndicator(document.querySelector('.tab.active'));
});


function toggleFields() {
    var type = document.getElementById('Pb_type').value;
    var journalFields = document.getElementById('journalFields');
    var conferenceFields = document.getElementById('conferenceFields');
    journalFields.style.display = (type === 'Journal' || type === 'Book') ? 'block' : 'none';
    conferenceFields.style.display = (type === 'Conference Paper') ? 'block' : 'none';
}

function toggleAuthors() {
    const belongs = document.getElementById('Pb_belongs').value;
    const authorsTextField = document.getElementById('Pb_authors-textField');
    const authorsOptions = document.getElementById('Pb_authors-options');
    if (belongs === 'Expert') {
        authorsTextField.style.display = 'none';
        authorsOptions.style.display = 'block';
    } else {
        authorsTextField.style.display = 'block';
        authorsOptions.style.display = 'none';
    }
}

function addAuthorField() {
    const belongs = document.getElementById('Pb_belongs').value;
    const container = document.getElementById('authors-container');
    if (belongs === 'Expert') {
        const select = document.createElement('select');
        select.name = 'Pb_authors[]';
        select.style = 'width: 100%; padding: 12px; margin-top: 10px; border: 1px solid #ddd; border-radius: 5px;';
        select.innerHTML = expertOptions;
        container.appendChild(select);
    } else {
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'Pb_authors[]';
        input.placeholder = 'Enter author name';
        input.style = 'width: 100%; padding: 12px; margin-top: 10px; border: 1px solid #ddd; border-radius: 5px;';
        container.appendChild(input);
    }
}

function updateFileName(input) {
    if (input.files && input.files[0]) {
        document.getElementById('file_name').textContent = "Selected: " + input.files[0].name;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    toggleFields();
    toggleAuthors();
});

function showCitationPopup() {
    document.getElementById('citation-popup').style.display = 'block';
}

function hideCitationPopup() {
    document.getElementById('citation-popup').style.display = 'none';
}

function copyToClipboard(elementId) {
    var text = document.getElementById(elementId).innerText;
    navigator.clipboard.writeText(text).then(function() {
      alert('Citation copied to clipboard');
    }, function(err) {
      alert('Failed to copy text: ', err);
    });
}

function confirmDelete(publicationId) {
    var result = confirm("Are you sure you want to delete this publication?");
    if (result) {
        document.getElementById('deleteForm_' + publicationId).submit();
    }
    return false; // Prevent the form from submitting automatically
}