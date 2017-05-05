<?php

namespace GlgProductions\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BeSimple\I18nRoutingBundle\Routing\Annotation\I18nRoute;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use GlgProductions\CmsBundle\Entity\Media;

class MediaController extends Controller
{
    /**
     * @I18nRoute({ "en":"/en/admin/media/gallery","nl":"/nl/admin/media/gallerij","fr":"/fr/admin/media/galerie","de":"/de/admin/media/galerie" }, name="admin_media_gallery")
     */
    public function mediaGalleryAction(){
        $media = $this->getDoctrine()->getRepository("CmsBundle:Media")->findByType(1);
        return $this->render("AdminBundle:Media:gallery.html.twig", [
            "media" => $media,
            "site_title" => $this->get("cms")::get_setting("site_title")->getSetting()
        ]);
    }

    /**
     * @I18nRoute({ "en":"/en/admin/media/new","nl":"/nl/admin/media/nieuw","fr":"/fr/admin/media/nouveau","de":"/de/admin/media/neu" }, name="admin_media_upload")
     */
    public function mediaUploadAction(){
        return $this->render("AdminBundle:Media:upload.html.twig", [
            "site_title" => $this->get("cms")::get_setting("site_title")->getSetting()
        ]);
    }

    /**
     * @I18nRoute("/media/upload/file", name="mediaUpload")
     */
    public function uploadMediaAction(Request $request)
    {
        $file = $request->files->get("file");
        $status = ["status" => "Error"];

        if(!is_null($file)){
        	$m = new Media();
        	$filename = uniqid().".".$file->getClientOriginalExtension();

        	$path = $this->getParameter('uploads_directory') . "images";
        	$file->move($path,$filename);
        	$m->setUrl("/assets/uploads/images/".$filename);
            $t = $this->getDoctrine()->getRepository("CmsBundle:Type")->findOneByType("image");
            $m->setType($t);
        	$em = $this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
            $status = ["status" => "Success"];
        }

        return new JsonResponse($status);
    }

}
