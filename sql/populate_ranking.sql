drop table ranking cascade constraints;


create table ranking
(APN                                    number not null,
permit_on_file                  varchar2(4),
age_of_system                   varchar2(25),
proximity                               varchar2(25),
currently_compliant             varchar2(25),
slope                                   varchar2(25),
condition                               varchar2(25),
soil                                    varchar2(25),
comments                                varchar2(215),
total_score                             number,
primary key     (apn)
);


    	insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(514113001, 'yes', '1980-1990', '50-100ft', 'yes', '0-5', 'good', 'zone1');
        
    	insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(514113002, 'no', '1980-1990', '50-100ft', 'no', '5-10', 'good', 'zone3');

        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(514123013, 'yes', '1980-1990', '50-100ft', 'yes', '0-5', 'moderate', 'zone1');

        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(511371033, 'yes', '1990-2000', '100-150ft', 'yes', '5-10', 'good', 'zone2');

        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(511371032, 'no', 'pre-1980', '50-100ft', 'no', '20-30', 'poor', 'zone3');

        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(514111012, 'no', '1980-1990', '50-100ft', 'no', '0-5', 'good', 'zone4');

        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(511491035, 'no', '1980-1990', '50-100ft', 'no', '5-10', 'failing', 'zone3');

        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(515341029, 'yes', '2017-present', '100-150ft', 'yes', '20-30', 'good', 'zone3');

		insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(515341030, 'yes', '2017-present', '0-50ft', 'yes', '20-30', 'good', 'zone4');

        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(514112022, 'yes', '1980-1990', '50-100ft', 'no', '5-10', 'good', 'zone3');


        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(514012013, 'yes', '2000-2010', '150-200ft', 'no', '5-10', 'moderate', 'zone4');

	    insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(514112018, 'yes', '2000-2010', '150-200ft', 'yes', '10-15', 'moderate', 'zone4');


        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(515341003, 'no', 'pre-1980', '150-200ft', 'no', '5-10', 'moderate', 'zone4');


        insert into ranking (APN, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil)
        values(515131028, 'yes', '2010-2017', '150-200ft', 'yes', '20-30', 'moderate', 'zone2');





