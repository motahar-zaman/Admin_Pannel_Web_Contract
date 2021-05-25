<?php


namespace App\Controllers\Contract;


use App\Controllers\BaseController;
use App\Models\Common\AddressModel;
use App\Models\Contract\ContractModel;
use App\Models\Contractor\ContractorModel;

class ContractController extends BaseController
{
    public function contractSearch(){
        if( session() && session()->get('login') ){
            $prefectures = (new AddressModel())->getAllPrefecture();
            if($_SERVER['QUERY_STRING']){
                $contractId = $_GET['contractIdSearch'] ?? null;
                $tantouId = $_GET['tantouIdSearch'] ?? null;
                $contractorId = $_GET['contractorIdSearch'] ?? null;
                $contractorName = $_GET['contractorNameSearch'] ?? null;
                $productId = $_GET['productIdSearch'] ?? null;
                $productName = $_GET['productNameSearch'] ?? null;
                $shopId = $_GET['shopIdSearch'] ?? null;
                $shopName = $_GET['shopNameSearch'] ?? null;
                $prefecture = $_GET['prefectureSearch'] ?? null;

                if($contractId != ""){
                    $contract = (new ContractModel())->getContractById($contractId);
                    if(isset($contract) && count($contract) > 0 ){
                        return redirect()->to("contract-details/".$contractId);
                    }
                    else{
                        return view("Contract/contractSearch", ["title" => "Contract Search", "contracts" => $contract, "prefectures" => $prefectures]);
                    }
                }
                elseif($contractorId != "" || $contractorName != "" || $productId != "" || $productName != "" || $shopId != "" || $shopName != "" || $prefecture != "0" || $prefecture != ""){
                    $contract = (new ContractModel())->getContractBySearchOptions($contractorId, $contractorName, $productId, $productName, $shopId, $shopName, $prefecture, $tantouId);
                    return view("Contract/contractSearch", ["title" => "Contract Search", "contracts" => $contract, "prefectures" => $prefectures]);
                }
                else{
                    return view("Contract/contractSearch", ["title" => "Contract Search", "contracts" => array(), "prefectures" => $prefectures]);
                }
            }
            else{
                $contract = (new ContractModel())->getAllContract();
                return view("Contract/contractSearch", ["title" => "Contract Search", "contracts" => $contract, "prefectures" => $prefectures]);
            }
        }
        else{
            return redirect()->to("/login");
        }
    }

    public function contractDetails($contractId){
        if( session() && session()->get('login') ){
            $contract = (new ContractModel())->getContractById($contractId);
            $contractDetails = $contract[$contractId];

            if(isset($contractDetails) && $contractDetails->getContractorId() ){
                $contractorDetails = (new ContractorModel())->getContractorDetailsById($contractDetails->getContractorId());
            }

            return view("Contract/contractDetails", ["title" => "Contract Details", "contract" => $contractDetails ?? null, "contractorDetails" => $contractorDetails[0] ?? null]);
        }
        else{
            return redirect()->to("/login");
        }
    }
}