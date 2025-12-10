# Todo Application

A simple Todo application built with Laravel 10, featuring user authentication, CRUD operations, and a modern UI with Tailwind CSS.

## Features

- User authentication (Login, Register, Password Reset)
- Create, Read, Update, and Delete todos
- Mark todos as completed (one-way operation)
- Users can only access their own todos
- Form validation with error display
- Responsive design with Tailwind CSS
- Password reset via Gmail SMTP

## Requirements

- PHP >= 8.1
- Composer
- Node.js and NPM
- MySQL/PostgreSQL/SQLite
- Gmail account (for password reset functionality)

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd todo_app
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node dependencies:
```bash
npm install
```

4. Copy environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your `.env` file with database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Configure Gmail SMTP settings in `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your_email@gmail.com"
MAIL_FROM_NAME="Ishuli LMS"
```

8. Run migrations:
```bash
php artisan migrate
```

9. Build assets:
```bash
npm run build
# Or for development with hot reload:
npm run dev
```

10. Start the development server:
```bash
php artisan serve
```

11. Visit `http://localhost:8000` in your browser.

## Usage

1. **Register/Login**: Create an account or login with existing credentials
2. **Create Todo**: Click "Create Todo" to add a new task
3. **View Todos**: All your todos are listed on the main page
4. **Edit Todo**: Click "Edit" to modify a todo
5. **Mark Complete**: Click "Mark as Complete" to complete a task (cannot be undone)
6. **Delete Todo**: Click "Delete" to remove a todo
7. **Password Reset**: Use "Forgot Password" link on login page

## Todo Fields

- **title** (required): The todo title
- **description** (optional): Additional details
- **due_date** (required): When the todo is due
- **is_completed** (boolean): Completion status

## Routes

- `GET /todos` - List all todos
- `GET /todos/create` - Show create form
- `POST /todos` - Store new todo
- `GET /todos/{todo}/edit` - Show edit form
- `PUT/PATCH /todos/{todo}` - Update todo
- `DELETE /todos/{todo}` - Delete todo
- `PATCH /todos/{todo}/toggle-complete` - Mark todo as complete

## Security

- All todo routes are protected by authentication middleware
- Users can only access their own todos (enforced by policies)
- Password reset uses secure token-based system
- CSRF protection enabled on all forms

## Technologies Used

- **Backend**: Laravel 10
- **Frontend**: Blade Templates with Tailwind CSS
- **Database**: MySQL/PostgreSQL/SQLite
- **Authentication**: Laravel UI
- **Email**: Gmail SMTP

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

For questions or issues, please contact: rwbuild@rwandabuildprogram.com
