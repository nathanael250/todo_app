import './bootstrap';

// Live form validation
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form[action*="todos"]');
    
    forms.forEach(form => {
        const titleInput = form.querySelector('#title');
        const dueDateInput = form.querySelector('#due_date');
        const descriptionInput = form.querySelector('#description');
        
        // Title validation
        if (titleInput) {
            titleInput.addEventListener('blur', function() {
                validateTitle(this);
            });
            
            titleInput.addEventListener('input', function() {
                if (this.classList.contains('border-red-500')) {
                    validateTitle(this);
                }
            });
        }
        
        // Due date validation
        if (dueDateInput) {
            dueDateInput.addEventListener('change', function() {
                validateDueDate(this);
            });
            
            dueDateInput.addEventListener('blur', function() {
                validateDueDate(this);
            });
        }
        
        // Form submission validation
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            if (titleInput && !validateTitle(titleInput)) {
                isValid = false;
            }
            
            if (dueDateInput && !validateDueDate(dueDateInput)) {
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    });
});

function validateTitle(input) {
    const value = input.value.trim();
    const parentDiv = input.parentElement;
    let errorDiv = parentDiv.querySelector('.live-error-message');
    
    // Remove error styling
    input.classList.remove('border-red-500');
    input.classList.add('border-gray-300');
    
    if (!value) {
        showLiveError(input, 'The title field is required.');
        return false;
    }
    
    if (value.length > 150) {
        showLiveError(input, 'The title may not be greater than 150 characters.');
        return false;
    }
    
    // Remove error message if validation passes
    if (errorDiv) {
        errorDiv.remove();
    }
    
    return true;
}

function validateDueDate(input) {
    const value = input.value;
    const parentDiv = input.parentElement;
    let errorDiv = parentDiv.querySelector('.live-error-message');
    
    // Remove error styling
    input.classList.remove('border-red-500');
    input.classList.add('border-gray-300');
    
    if (!value) {
        showLiveError(input, 'The due date field is required.');
        return false;
    }
    
    const selectedDate = new Date(value);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    if (selectedDate < today) {
        showLiveError(input, 'The due date must be today or a future date.');
        return false;
    }
    
    // Remove error message if validation passes
    if (errorDiv) {
        errorDiv.remove();
    }
    
    return true;
}

function showLiveError(input, message) {
    const parentDiv = input.parentElement;
    let errorDiv = parentDiv.querySelector('.live-error-message');
    
    input.classList.remove('border-gray-300');
    input.classList.add('border-red-500');
    
    if (!errorDiv) {
        errorDiv = document.createElement('div');
        errorDiv.className = 'live-error-message text-red-500 text-sm mt-1';
        parentDiv.appendChild(errorDiv);
    }
    
    errorDiv.textContent = message;
}
