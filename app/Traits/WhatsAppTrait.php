<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\Models\UserWhatsAppSetting;

use Netflie\WhatsAppCloudApi\WhatsAppCloudApi;
use Netflie\WhatsAppCloudApi\Message\Media\LinkID;


trait WhatsAppTrait
{
    protected $accessToken;
    protected $apiVersion = 'v20.0'; // Update as per the latest version.
    protected $businessAccountId;
    protected $phone_number_id;

    public function initWhatsApp()
    {
        $customer_id = getCustomerId(); 
        $whatsapp_setting = UserWhatsAppSetting::where('customer_id', $customer_id)->first(); 
        if($whatsapp_setting){
            $this->accessToken = $whatsapp_setting->permanent_access_token;
            $this->businessAccountId = $whatsapp_setting->business_account_id;
            $this->phone_number_id = $whatsapp_setting->whatsapp_phone_number_id;
        }else{
            $this->accessToken = config('services.whatsapp.access_token');
            $this->businessAccountId = config('services.whatsapp.business_account_id');
            $this->phone_number_id = config('WHATSAPP_BUSINESS_PHONE_NO_ID_ID');
        }
    }

    /**
     * Create a WhatsApp message template
     */
    public function createWhatsAppTemplate($templateData)
    {
        $this->initWhatsApp();

        try {
            $client = new Client();
            $url = "https://graph.facebook.com/{$this->apiVersion}/{$this->businessAccountId}/message_templates";

                 /*   echo '<pre>'; print_r(json_encode([
                        'name' => $templateData['name'],
                        'category' => $templateData['category'],
                        'language' => $templateData['language'],
                        'components' => $templateData['components'],
                    ])); echo '</pre>'; exit();*/


                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($templateData),
                        CURLOPT_HTTPHEADER => array(
                            'Content-Type: application/json',
                            'Authorization: Bearer '.$this->accessToken
                        ),
                    ));

                    $response = curl_exec($curl);                  

                    curl_close($curl);
                    return json_decode($response, true);

                } catch (\Exception $e) {
                    Log::error('Error creating WhatsApp template: ' . $e->getMessage());
                  // echo '<pre>'; print_r($e->getMessage()); echo '</pre>'; exit();
                    return ['status'=>500,'content'=>$e->getMessage()];

                    return false;
                }
            }

    /**
     * Update a WhatsApp message template
     */
    public function updateWhatsAppTemplate($templateId, $templateData)
    {              
        $this->initWhatsApp();

        try {
            $client = new Client();

            $url = "https://graph.facebook.com/{$this->apiVersion}/{$templateId}";


            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($templateData),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$this->accessToken
                ),
            ));

            $response = curl_exec($curl);                  

            curl_close($curl);
            return json_decode($response, true);

        } catch (\Exception $e) {
            Log::error('Error updating WhatsApp template: ' . $e->getMessage());
            return ['status'=>500,'content'=>$e->getMessage()];

            return false;
        }
    }

    /**
     * Delete a WhatsApp message template
     */
    public function deleteWhatsAppTemplate($templateName)
    {
        $this->initWhatsApp();

        try {
            $client = new Client();
            $url = "https://graph.facebook.com/{$this->apiVersion}/{$this->businessAccountId}/message_templates/?name=".$templateName;

            $response = $client->delete($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ]
            ]);

                  // echo '<pre>'; print_r($response); echo '</pre>'; exit();


            return json_decode($response->getBody(), true);

        } catch (\Exception $e) {
            Log::error('Error deleting WhatsApp template: ' . $e->getMessage());
                  // echo '<pre>'; print_r($e->getMessage()); echo '</pre>'; exit();

            return false;
        }
    }

    /**
     * Retrieve a WhatsApp message template
     */
    public function getWhatsAppTemplate($templateId)
    {
        $this->initWhatsApp();

        try {
            $client = new Client();
            $url = "https://graph.facebook.com/{$this->apiVersion}/{$this->businessAccountId}/message_templates/{$templateId}";

            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ]
            ]);

            return json_decode($response->getBody(), true);

        } catch (\Exception $e) {
            Log::error('Error retrieving WhatsApp template: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * List all WhatsApp templates
     */
    public function listWhatsAppTemplates()
    {
        $this->initWhatsApp();
        try {
            $client = new Client();
            $url = "https://graph.facebook.com/{$this->apiVersion}/{$this->businessAccountId}/message_templates";

            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                ]
            ]);

            return json_decode($response->getBody(), true);

        } catch (\Exception $e) {
            Log::error('Error listing WhatsApp templates: ' . $e->getMessage());
            echo '<pre>'; print_r($e->getMessage()); echo '</pre>'; exit();

            return false;
        }
    }


    public function uploadMediaToWhatsapp($media_file_path, $mime_type)
    {
        $customer_id = getCustomerId(); 
        $whatsapp_setting = UserWhatsAppSetting::where('customer_id', $customer_id)->first(); 
        if($whatsapp_setting){
            $access_token = $whatsapp_setting->permanent_access_token;
            $phone_number_id = $whatsapp_setting->whatsapp_phone_number_id;
        }else{
            $access_token = config('WHATSAPP_ACCESS_TOKEN');
            $phone_number_id = env('WHATSAPP_BUSINESS_PHONE_NO_ID_ID');
        }

        $url = "https://graph.facebook.com/".$this->apiVersion."/".$phone_number_id."/media";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $access_token",
            "Content-Type: multipart/form-data"
        ]);


        $data = [
            'file' => '@' .realpath($media_file_path),
            'type' => $mime_type,
            'messaging_product' => 'whatsapp'
        ];

              // echo '<pre>'; print_r($data); echo '</pre>'; exit();


        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
          echo '<pre>'; print_r($response); echo '</pre>'; exit();
          $response_data = json_decode($response, true);

          if (isset($response_data['id'])) {
            return $response_data['id'];
        } else {
            echo 'Error: Could not retrieve media ID';
            print_r($response_data);
        }
    }

    curl_close($ch);
}

public function downloadAndStoreMedia($mediaID, $ext=".jpg"){

    $url =  "https://graph.facebook.com/".$this->apiVersion."/".$mediaID;
    $accessToken = $this->accessToken;
    try {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->get($url);


        $statusCode = $response->status();
        $content = json_decode($response->body(),true);

        $responseImage = $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($content['url']);

        $fileContents = $responseImage->getBody()->getContents();

        if(env('STORAGE_ACCESS') == 's3'){
            $fileName='uploads/customer/'.auth()->user()->id.'/chats/'.$content['id'].$ext;
            $path = Storage::disk('s3')->put($fileName, $fileContents,'public');
            return Storage::disk('s3')->url($fileName);
        }else{
            $localPath = public_path('uploads/customer/'.auth()->user()->id.'/chats/'.$content['id'].$ext);
            file_put_contents($localPath, $fileContents);
            $url=config('app.url').'uploads/customer/'.auth()->user()->id.'/chats/'.$content['id'].$ext;
            return preg_replace('#(https?:\/\/[^\/]+)\/\/#', '$1/', $url);
        } 

    }catch (\Exception $e) {
        dd($e);
    }
}

public function uploadMedia($imagePath)
{

    $customer_id = getCustomerId(); 
    $whatsapp_setting = UserWhatsAppSetting::where('customer_id', $customer_id)->first(); 
    if($whatsapp_setting){
        $access_token = $whatsapp_setting->permanent_access_token;
        $phone_number_id = $whatsapp_setting->whatsapp_phone_number_id;
    }else{
        $access_token = config('WHATSAPP_ACCESS_TOKEN');
        $phone_number_id = env('WHATSAPP_BUSINESS_PHONE_NO_ID_ID');
    }

    $url = "https://graph.facebook.com/".$this->apiVersion."/{$phone_number_id}/media";

    try {
        $client = new Client();
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $access_token,
            ],
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($imagePath, 'r'),
                    'filename' => basename($imagePath),
                ],
                [
                    'name'     => 'messaging_product',
                    'contents' => 'whatsapp',
                ],
            ],
        ]);

        return json_decode($response->getBody(), true);
    } catch (RequestException $e) {
        if ($e->hasResponse()) {
            return json_decode($e->getResponse()->getBody()->getContents(), true);
        }
        return [
            'success' => false,
            'message' => 'Media upload failed: ' . $e->getMessage(),
        ];
    }
}


public function uploadMediaToFacebookStep1($fileUrl, $fileSize, $mimeType)
{
    $customer_id = getCustomerId(); 
    $whatsapp_setting = UserWhatsAppSetting::where('customer_id', $customer_id)->first(); 
    if($whatsapp_setting){
        $accessToken = $whatsapp_setting->permanent_access_token;
        $appId = $whatsapp_setting->whatsapp_app_id;
    }else{
        $accessToken = config('WHATSAPP_ACCESS_TOKEN');
        $appId = env('WHATSAPP_APP_ID');
    }

        // Upload the image to Facebook
    $apiUrl = "https://graph.facebook.com/". $this->apiVersion. "/" . $appId. "/uploads?file_length={$fileSize}&file_type={$mimeType}&access_token={$accessToken}";
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $apiUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => file_get_contents($fileUrl),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: ' . $mimeType,
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
        // Parse the response to extract the session ID
    $responseArray = json_decode($response, true);
    if (isset($responseArray['id'])) {
        return $responseArray['id'];
    } else {
            return null; // Handle error condition
        }
    }

    public function uploadMediaToFacebookStep2($fileUrl, $session_id)
    {
        $customer_id = getCustomerId(); 
        $whatsapp_setting = UserWhatsAppSetting::where('customer_id', $customer_id)->first(); 
        if($whatsapp_setting){
            $accessToken = $whatsapp_setting->permanent_access_token;
        }else{
            $accessToken = config('WHATSAPP_ACCESS_TOKEN');
        }

        // Upload the image to Facebook
        $apiUrl = "https://graph.facebook.com/". $this->apiVersion. "/" .$session_id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => file_get_contents($fileUrl), // Assuming $fileUrl contains the file contents
            CURLOPT_HTTPHEADER => array(
                'Authorization: OAuth ' . $accessToken,
                'file_offset: 0',
                'Content-Type: text/plain'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // Parse the response to extract the session ID
        $responseArray = json_decode($response, true);
        if (isset($responseArray['h'])) {
            return $responseArray['h'];
        } else {
            return null; // Handle error condition
        }
    }

    public function uploadMediaToFacebook($file, $media_url)
    { 
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $session_id = $this->uploadMediaToFacebookStep1($file, $fileSize, $mimeType);
        if (empty($session_id)) {  
            return null;
        }

        $media = $this->uploadMediaToFacebookStep2($media_url, $session_id);
        if (empty($media)) {
            return null;
        }
        return $media;
    }

    public function sendAudioMessage($audio_link, $to)
    { 
        $this->initWhatsApp();

        $whatsapp_cloud_api = new WhatsAppCloudApi([
            'from_phone_number_id' => $this->phone_number_id,
            'access_token' => $this->accessToken,
            'business_id' => $this->businessAccountId,
            'graph_version' => $this->apiVersion,
        ]);

        // $whatsapp_cloud_api->sendTextMessage($to, 'Hey there! I\'m using WhatsApp Cloud API. Visit https://www.netflie.es');

        $link_id = new LinkID($audio_link);
        $response = $whatsapp_cloud_api->sendAudio($to, $link_id);

              echo '<pre>'; print_r($response); echo '</pre>'; exit();
              

    }
}
