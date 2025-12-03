# TODO List for Mosque Donation and Expense Management App

## 1. Database Setup
- [ ] Update .env for MySQL configuration (DB_CONNECTION=mysql, DB_DATABASE=masjid_app, etc.)
- [ ] Create migration for donations table (id, user_id, amount, description, date, image, category_id)
- [ ] Create migration for expenses table (similar to donations)
- [ ] Create migration for categories table (id, name, type)
- [ ] Add role column to users table via migration
- [ ] Run php artisan migrate

## 2. Models
- [x] Update User model to include role attribute
- [x] Create Donation model with relationships (belongsTo User, Category)
- [x] Create Expense model with relationships (belongsTo User, Category)
- [x] Create Category model with relationships (hasMany Donations, Expenses)

## 3. Authentication
- [ ] Install Laravel Breeze (composer require laravel/breeze --dev, php artisan breeze:install, npm install, npm run build)
- [ ] Set up auth routes and views
- [ ] Add role-based middleware (admin, user)

## 4. CRUD Operations
- [ ] Create DonationController with index, create, store, show, edit, update, destroy
- [ ] Create ExpenseController (similar to DonationController)
- [ ] Create CategoryController (similar)
- [ ] Create views for each CRUD (index with data tables, forms for create/edit)

## 5. Frontend
- [ ] Set up minimalist layout with navbar/sidebar using Tailwind CSS
- [ ] Create dashboard view
- [ ] Ensure all views are responsive and simple

## 6. Routing
- [ ] Update routes/web.php with all CRUD routes, auth routes, dashboard, chatbot

## 7. Chatbot
- [ ] Create ChatbotController with method to call OpenRouter API using provided key
- [ ] Create chat view with interface
- [ ] Add /chatbot route

## 8. Early Warning System
- [ ] Configure Laravel Notifications for email
- [ ] Add WhatsApp notification driver (install package like laravel-notification-channels/twilio)
- [ ] Create notification classes for low balance, new entries
- [ ] Add triggers in controllers/models

## 9. Image Cropping
- [ ] Install Cropper.js (npm install cropperjs)
- [ ] Integrate in create/edit forms for donations/expenses
- [ ] Handle image upload and cropping before save

## Followup Steps
- [ ] Install additional dependencies (e.g., for notifications, image handling)
- [ ] Seed roles and sample data
- [ ] Test authentication, CRUD, chatbot, notifications, image cropping
- [ ] Ensure all features work together
