<?php
namespace Drupal\clockmodule\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Serialization\Json;
use Drupal\Core\Entity;
/**
 * @Block(
 *   id = "weather_block",
 *   admin_label = @Translation("weather block"),
 *   category = @Translation("City weather")
 * )
 */
class clockblock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function blockSubmit()
   {
   }
   public function build() {
    $service = \Drupal::service('clockmoduleservice');
    $data=$service->myservice();
    $res=Json::decode($data);
    $config = $this->getConfiguration();
     return [
         '#utcOffset'=>$res['main']['utcOffset'],
         '#timeZoneName'=>$res['main']['timeZoneName'],
         '#ordinalDate' =>$res['main']['ordinalDate'],
     ];
      }
}