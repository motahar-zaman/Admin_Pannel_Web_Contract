<?php


namespace App\Models\Contractor;


use App\Models\Database;

class RegistrationModel
{
    public function storeContractorData(Contractor $contractor){
        $id = $contractor->getId();
        $name = $contractor->getName();
        $kana = $contractor->getNameKana();
        $password = $contractor->getPassword();
        $zip = $contractor->getZipCode();
        $address1 = $contractor->getAddress01();
        $address2 = $contractor->getAddress02();
        $phn = $contractor->getTelNo();
        $fax = $contractor->getFaxNo();
        $mail = $contractor->getMailAddress();
        $type = $contractor->getType();
        $update = $contractor->getUpdateDate();
        $updateUser = $contractor->getUpdateUserId();
        $insert = $contractor->getInsertDate();
        $insertUser = $contractor->getInsertUserId();
        $delete = $contractor->getDeleteFlag();
        $temp = $contractor->getTemporary();

        $queryString = "INSERT INTO mst_contractor(contractor_id, contractor_name, contractor_name_kana, password, zipcode, address_01, address_02, tel_no, fax_no,
                        mail_address, type_contractor, update_date, update_user_id, insert_date, insert_user_id, delete_flag, temporary) VALUES ('$id', '$name', '$kana',
                        '$password', '$zip', '$address1', '$address2', '$phn', '$fax', '$mail', '$type', '$update', '$updateUser', '$insert', '$insertUser', '$delete', '$temp')";

        return (new Database())->queryExecution($queryString);
    }

    public function storeCompanyData(Company $company){
        $id = $company->getId();
        $name = $company->getName();
        $kana = $company->getNameKana();
        $representative = $company->getRepresentative();
        $representativeKana = $company->getRepresentativeKana();
        $zip = $company->getZipCode();
        $address1 = $company->getAddress01();
        $address2 = $company->getAddress02();
        $phn = $company->getTelNo();
        $fax = $company->getFaxNo();
        $mail = $company->getMailAddress();
        $update = $company->getUpdateDate();
        $updateUser = $company->getUpdateUserId();
        $insert = $company->getInsertDate();
        $insertUser = $company->getInsertUserId();
        $delete = $company->getDeleteFlag();

        $queryString = "INSERT INTO mst_company(company_id, company_name, company_name_kana,  representative, representative_kana, zipcode, address_01, address_02,
                        tel_no, fax_no, mail_address, update_date, update_user_id, insert_date, insert_user_id, delete_flag) VALUES ('$id', '$name', '$kana', '$representative',
                        '$representativeKana', '$zip', '$address1', '$address2', '$phn', '$fax', '$mail', '$update', '$updateUser', '$insert', '$insertUser', '$delete')";

        return (new Database())->queryExecution($queryString);
    }

    public function storeGroupData(Group $group){
        $id = $group->getId();
        $name = $group->getName();
        $kana = $group->getNameKana();
        $representative = $group->getRepresentative();
        $representativeKana = $group->getRepresentativeKana();
        $zip = $group->getZipCode();
        $address1 = $group->getAddress01();
        $address2 = $group->getAddress02();
        $phn = $group->getTelNo();
        $fax = $group->getFaxNo();
        $mail = $group->getMailAddress();
        $update = $group->getUpdateDate();
        $updateUser = $group->getUpdateUserId();
        $insert = $group->getInsertDate();
        $insertUser = $group->getInsertUserId();
        $delete = $group->getDeleteFlag();

        $queryString = "INSERT INTO mst_group(group_id , group_name, group_name_kana, representative, representative_kana, zipcode, address_01, address_02, tel_no,
                        fax_no,mail_address, update_date, update_user_id, insert_date, insert_user_id, delete_flag) VALUES ('$id', '$name', '$kana', '$representative',
                        '$representativeKana', '$zip', '$address1', '$address2', '$phn', '$fax', '$mail', '$update', '$updateUser', '$insert', '$insertUser', '$delete')";

        return (new Database())->queryExecution($queryString);
    }
}