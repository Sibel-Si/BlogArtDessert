document.addEventListener('DOMContentLoaded', function(){
    const addBtn = document.getElementById('addBtn');
    const removeBtn = document.getElementById('removeBtn');
    const available = document.getElementById('numMotCleAvailable');
    const chosen = document.getElementById('numMotCle[]');

    addBtn.addEventListener('click', function(){
        Array.from(available.selectedOptions).forEach(opt => {
            chosen.appendChild(opt);
        });
    });

    removeBtn.addEventListener('click', function(){
        Array.from(chosen.selectedOptions).forEach(opt => {
            available.appendChild(opt);
        });
    });
});