<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Trigger to check whether an email is unique for each table
        DB::unprepared('
            CREATE OR REPLACE FUNCTION check_unique_email()
            RETURNS TRIGGER
            LANGUAGE PLPGSQL
            AS $$
            BEGIN
                IF (TG_OP = \'INSERT\') OR (TG_OP = \'UPDATE\' AND NEW.email IS DISTINCT FROM OLD.email) THEN 
                    IF EXISTS (SELECT 1 FROM author WHERE email = NEW.email) OR
                       EXISTS (SELECT 1 FROM supplier WHERE email = NEW.email) THEN
                        RAISE EXCEPTION \'Sorry this email already exists across tables.\';
                    END IF;
                END IF;
                RETURN NEW;
            END;
            $$;
        ');

        // Function to check unique email for staff
        DB::unprepared('
            CREATE OR REPLACE FUNCTION check_unique_email_staff()
            RETURNS TRIGGER
            LANGUAGE PLPGSQL
            AS $$
            BEGIN
                IF (TG_OP = \'INSERT\') OR (TG_OP = \'UPDATE\' AND NEW.email IS DISTINCT FROM OLD.email) THEN
                    IF EXISTS (SELECT 1 FROM author WHERE email = NEW.email) OR

                    EXISTS (SELECT 1 FROM supplier WHERE email = NEW.email) OR
                    EXISTS (SELECT 1 FROM staff WHERE email = NEW.email AND staff_id != NEW.staff_id) THEN
                        RAISE EXCEPTION \'Sorry this email already exists across tables.\';
                    END IF;
                END IF;
                RETURN NEW;
            END;
            $$;
        ');

        // Creating triggers for each table
        DB::unprepared('
            DO $$
            BEGIN
                IF NOT EXISTS (SELECT 1 FROM pg_trigger WHERE tgname = \'author_email_check\') THEN
                    CREATE TRIGGER author_email_check
                    BEFORE INSERT OR UPDATE ON author
                    FOR EACH ROW EXECUTE FUNCTION check_unique_email();
                END IF;
            END
            $$;
        ');

        DB::unprepared('
            DO $$
            BEGIN
                IF NOT EXISTS (SELECT 1 FROM pg_trigger WHERE tgname = \'supplier_email_check\') THEN
                    CREATE TRIGGER supplier_email_check
                    BEFORE INSERT OR UPDATE ON supplier
                    FOR EACH ROW EXECUTE FUNCTION check_unique_email();
                END IF;
            END
            $$;
        ');

        DB::unprepared('
            DO $$
            BEGIN
                IF NOT EXISTS (SELECT 1 FROM pg_trigger WHERE tgname = \'staff_email_check\') THEN
                    CREATE TRIGGER staff_email_check
                    BEFORE INSERT OR UPDATE ON staff
                    FOR EACH ROW EXECUTE FUNCTION check_unique_email();
                END IF;
            END
            $$;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Dropping the triggers if it already exists
        DB::unprepared('DROP TRIGGER IF EXISTS author_email_check ON author;');
        DB::unprepared('DROP TRIGGER IF EXISTS supplier_email_check ON supplier;');
        DB::unprepared('DROP TRIGGER IF EXISTS staff_email_check ON staff;');
        DB::unprepared('DROP FUNCTION IF EXISTS check_unique_email();');
    }
};
